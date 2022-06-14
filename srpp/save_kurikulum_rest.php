<?php
    // redirect to login_page.php if user has not logged
    session_start();
    if (!isset($_SESSION['username'])) {
        $error_message = urlencode('Anda Belum Login');
        header("location: login.php?error_message=$error_message");
    }

    require "./model/DB.php";
    require "./model/Input.php";
    require "./model/DataKurikulumUtama.php";
    require "./model/DataKurikulumUser.php";

    if(empty(Input::get('id'))) {
        header('Location:index.php');
    }

    $DB = DB::getInstance();
    $u_id = Input::get('id');

    $k_user = new DataKurikulumUser();
    //mengecek apakah ada id_tambah, jika ada maka memanggil fungsi addKurikulum
    if (!empty(Input::get('id_tambah'))) {
        //memanggil add
        $k_id = Input::get('id_tambah');
        $k_user->insertWhere($k_id, $u_id);
        header("location:save_kurikulum.php?id={$u_id}");
    }

    $student = $DB->getWhereOnce("student", ['user_id','=',$u_id]);

    $kurikulum = $DB->orderBy('semester');
    $kurikulum_1 = $DB->getWhere("data_kurikulum_utama", ['kurikulum_id','=','3']);
    $kurikulum_2 = $DB->getWhere2("data_kurikulum_utama", ['NOT kategori','=','MKKPS'], ['kurikulum_id','=',$student->kurikulum_id]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Kurikulum Utama | SRPP</title>
     <link rel="stylesheet" href="./assets/style2.css" />
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
           <li><a href="index.php" target="_blank">Home</a></li>
           <li><a href="about.php" target="_blank">About</a></li>
        </div>
     </nav>
    <!-- header area end -->

    
    <?php
        if (Input::get('message') !== "") {
            echo "<div model=\"alert alert-success
            my-3\">".Input::get('message')."</div>";
        }
    ?>

  <!-- Home page start -->
  <div class="container tiga-menu">
     <ul>
     <?php
            echo '<li><a href="save_kurikulum.php?id='.$u_id.'">Show All</a></li>';
            echo '<li><a href="save_kurikulum_mkkps.php?id='.$u_id.'">MKKPS</a></li>';
            echo '<li><a href="save_kurikulum_rest.php?id='.$u_id.'">MKKIPS</a></li>';
            echo '<li>     </li><li>     </li><li>     </li>';
            echo '<li><a href="edit_kurikulum_user.php?id='.$u_id.'">Lanjut</a></li>';
        ?>
     </ul>
  </div>
  <main>
   <table id="kurikulum" border="1">
      <tr>
        <th>No</th>
        <th>Kode MK</th>
        <th>Kategori</th>
        <th>Nama MK</th>
        <th>Semester</th>
        <th>SKS</th>
        <th>Status</th>
      </tr>
      <!-- DATA_TABEL -->
      <tr>
      <?php
            $i = 1;
            foreach ($kurikulum_1 as $data) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>{$data->kode_matkul}</td>";
                echo "<td>{$data->kategori}</td>";
                echo "<td>{$data->nama_matkul}</td>";
                echo "<td>{$data->semester}</td>";
                echo "<td>{$data->sks}</td>";
                if ($DB->getWhereTwice("data_kurikulum_user", ['user_id','=',$u_id], ['data_kurikulum_utama_id','=',$data->id]) == TRUE) {
                    echo "<td>Sudah Ditambahkan</td>";
                } else {
                    echo "<td>
                    <a href='save_kurikulum.php?id={$u_id}&id_tambah=" . $data->id .  "' class='btn btn-warning''>Tambah</a>
                    </td>";
                }
                echo "</tr>";
                $i++;
            }

            $i = 1;
            foreach ($kurikulum_2 as $data) {
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>{$data->kode_matkul}</td>";
                echo "<td>{$data->kategori}</td>";
                echo "<td>{$data->nama_matkul}</td>";
                echo "<td>{$data->semester}</td>";
                echo "<td>{$data->sks}</td>";
                if ($DB->getWhereTwice("data_kurikulum_user", ['user_id','=',$u_id], ['data_kurikulum_utama_id','=',$data->id]) == TRUE) {
                    echo "<td>Sudah Ditambahkan</td>";
                } else {
                    echo "<td>
                    <a href='save_kurikulum.php?id={$u_id}&id_tambah=" . $data->id .  "' class='btn btn-warning''>Tambah</a>
                    </td>";
                }
                echo "</tr>";
                $i++;
            }
        ?>
       </tr>
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