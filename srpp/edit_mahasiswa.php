<?php
    // redirect to login_page.php if user has not logged
    session_start();
    if (!isset($_SESSION['username'])) {
        $error_message = urlencode('Anda Belum Login');
        header("location: login.php?error_message=$error_message");
    }

    require "./model/DB.php";
    require "./model/Input.php";

    $DB = DB::getInstance();

    $students = $DB->orderBy('nama');
    $students = $DB->get('student');
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Kurikulum Utama | SRPP</title>
     <link rel="stylesheet" type="text/css" href="./assets/style3.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <!-- ***** Header Area Start ***** -->
     <nav>
        <div class="menu-icon">
           <span class="fas fa-bars"></span>
        </div>
        <div class="logo">
           <a href="dashboard-user.html">SRPP</a>
        </div>
        <div class="nav-items">
           <li><a href="index.php">Home</a></li>
           <li><a href="admin_index.php">Dashboard</a></li>
           <li><a href="logout.php">Logout</a></li>
        </div>
     </nav>
    <!-- header area end -->

  <!-- Home page start -->
  <main>
   <table id="kurikulum" border="1">
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Tanggal Lahir</th>
        <th>Tahun Masuk</th>
        <th>Nama Jurusan</th>
        <th>Kurikulum</th>
        <th>IPK</th>
        <th>Edit</th>
      </tr>
      <?php
        $i = 1;
        foreach ($students as $data) {
            echo "<tr>";
            echo "<td scope=\"row\">$i</td>";
            echo "<td>{$data->nama}</td>";
            echo "<td>{$data->jenis_kelamin}</td>";
            echo "<td>{$data->tanggal_lahir}</td>";
            echo "<td>$data->tahun_masuk</td>";
            echo "<td>{$data->nama_jurusan}</td>";
            echo "<td>{$data->kurikulum_id}</td>";
            echo "<td>{$data->ipk}</td>";
            echo "<th scope=\"row\" class=\"text-center\">
            <a style=\"width:80px\"
                class=\"btn btn-info text-white d-inline-block\" href=\"./update_mahasiswa.php?id=$data->id\">Update</a>
            <a style=\"width:80px\"
                class=\"btn btn-danger text-white\" href=\"./delete_mahasiswa.php?id=$data->id\">Delete</a>
            </th>";
            echo "</tr>";
            $i++;
        }
    ?>
   </table>
  </main>

  <div class="clearfix"></div>
      
  <!-- Home page end -->

  <!-- Footer start -->
  <footer class="footer">
    <div class="container">
      <span>&copy;SRPP | Tugas Besar RPL | Kelompok 8 </span>
    </div>
  </footer>
  <!-- Footer end -->
</body>

<!-- script -->
<script src="assets/script.js"></script>
<!-- script end -->

</html>