<?php

    require './model/DB.php';
    require './model/Input.php';
    require './model/Validate.php';
    require './model/Student.php';

    if(empty(Input::get('id'))) {
        header('Location:index.php');
    }

    $DB = DB::getInstance();
    $uname = Input::get('id');
    $user = $DB->getWhereOnce("user", ['username','=',$uname]);
    //print "id = " . $user->id . " .. username = " . $uname . "-";

    $student = new Student();
    if (!empty($_POST)) { // form submitted
        $error_message = $student->validate($_POST);
        if (empty($error_message)) {
          $student->insert();
          $message = urlencode("Mahasiswa dengan nama <b>{$student->getItem('nama')}</b>, Nim <b>{$student->getItem('nama_jurusan')}</b> sudah berhasil ditambahkan");
          header("Location:save_kurikulum.php?id={$student->getItem('user_id')}");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-Up | SRPP</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <!-- ***** Header Area Start ***** -->
    <nav>
        <div class="menu-icon">
           <span class="fas fa-bars"></span>
        </div>
        <div class="logo">
           <a href="index.html">SRPP</a>
        </div>
        <div class="nav-items">
           <li><a href="index.php">Home</a></li>
           <li><a href="about.php">About</a></li>
        </div>
     </nav>
    <!-- header area end -->

    <!-- form sign up -->
    <div class="container sign">
        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
            <h1>Sign Up</h1>
            <p>Student Profile</p>
            
            <label>NAMA LENGKAP</label><br>
            <input type="hidden" id="user_id" name="user_id" value="<?= $user->id; ?>">
            <input placeholder="Nama Lengkap" type="text" id="nama" name="nama"
                value="<?php echo $student->getItem('nama'); ?>"/>
            
            <label>JENIS KELAMIN</label>
            <select name="jenis_kelamin" id="jenis_kelamin">
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            
            <label>TANGGAL LAHIR</label><br>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                value="<?php echo $student->getItem('tanggal_lahir'); ?>"/>
            
            <label>JURUSAN</label><br>
            <select name="nama_jurusan" id="nama_jurusan">
                <option value ="Pendidikan Ilmu Komputer">Pendidikan Ilmu Komputer</option>
                <option value ="Ilmu Komputer">Ilmu Komputer</option>
            </select>
            
            <label>TAHUN MASUK</label>
            <input placeholder="Tahun Masuk" type="number" id="tahun_masuk" name="tahun_masuk"
                value="<?php echo $student->getItem('tahun_masuk'); ?>">
            
            <input type="submit" name="submit" value="Sign Up" class="btn btn-primary">
        </form>
    </div>
    <!-- end form sign up -->

    <!-- Footer start -->
    <footer class="footer">
        <div class="container">
            <span>&copy;SRPP | Tugas Besar RPL | Kelompok 8 </span>
        </div>
    </footer>
  <!-- Footer end -->
</body>

<script src="assets/script.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</html>
