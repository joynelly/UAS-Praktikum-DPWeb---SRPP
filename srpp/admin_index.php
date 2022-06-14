<?php

    session_start();
    if (!isset($_SESSION['username'])) {
        $error_message = urlencode('Anda Belum Login');
        header("location: login.php?error_message=$error_message");
    }

    require "./model/DB.php";
    require "./model/Input.php";
    require "./model/DataKurikulumUtama.php";
    require "./model/DataKurikulumUser.php";

    $DB = DB::getInstance();
    $u_id = Input::get('id');
    $uname = $_SESSION['username'];

    $user = $DB->getWhereOnce("user", ['username','=',$uname]);

?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home | SRPP</title>
     <link rel="stylesheet" type="text/css" href="./assets/style3.css" />
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
           <li><a href="dashboard-admin.html">Home</a></li>
           <li><a href="about.html">About</a></li>
           <li><a href="logout.php">Logout</a></li>
        </div>
     </nav>
    <!-- header area end -->

<!-- Dashboard start -->
   <div class="grid-menu">
      <div class="item">
            <a href="edit_user_admin.php">
            <div class="icon">
               <img src="assets/images/edit-user-64.png" alt ="">
            </div>
            <div class="deskripsi">
               Edit Account
            </div>
         </a>
      </div>
      <div class="item">
         <a href="edit_mahasiswa.php">
            <div class="icon">
               <img src="assets/images/user-6-64.png" alt ="">
            </div>
            <div class="deskripsi">
               Student
            </div>
         </a>
      </div>
      <div class="item">
         <a href="edit_kurikulum_admin.php">
            <div class="icon">
               <img src="assets/images/edit-property-64.png" alt ="">
            </div>
            <div class="deskripsi">
               Kurikulum
            </div>
         </a>
      </div>
   </div>

  <div class="clearfix"></div>
      
  <!-- Dashboard end -->

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