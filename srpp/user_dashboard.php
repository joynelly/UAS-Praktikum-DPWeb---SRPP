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

    if(empty(Input::get('id'))) {
        header('Location:index.php');
    }

    $DB = DB::getInstance();
    $u_id = Input::get('id');

?>


<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home | SRPP</title>
     <link rel="stylesheet" href="./assets/style.css" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
     <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
           <li><a href="dashboard-user.html" target="_blank">Home</a></li>
           <li><a href="about.html" target="_blank">About</a></li>
           <li><a href="logout.php" target="_blank">Logout</a></li>
        </div>
     </nav>
    <!-- header area end -->

  <!-- Dashboard start -->
   <div class="grid-menu">
      <div class="item">
            <a href="#">
            <div class="icon">
               <img src="./assets/images/edit-user-64.png" alt ="">
            </div>
            <div class="deskripsi">
               Edit Account
            </div>
         </a>
      </div>
      <div class="item">
         <a href="#">
            <div class="icon">
               <img src="./assets/images/user-6-64.png" alt ="">
            </div>
            <div class="deskripsi">
               Edit Profile
            </div>
         </a>
      </div>
      <div class="item">
         <a href="#">
            <div class="icon">
               <img src="./assets/images/edit-property-64.png" alt ="">
            </div>
            <div class="deskripsi">
               Edit kurikulum
            </div>
         </a>
      </div>
      <div class="item">
         <a href="#">
            <div class="icon">
               <img src="./assets/images/add-list-64.png" alt ="">
            </div>
            <div class="deskripsi">
               Add MK
            </div>
         </a>
      </div>
      <div class="item">
         <a href="#">
            <div class="icon">
               <img src="./assets/images/calculator-3-64.png">
            </div>
            <div class="deskripsi">
               Hitung IPK
            </div>
         </a>
      </div>
      <div class="item">
         <a href="#">
            <div class="icon">
               <img src="./assets/images/planning-64.png">
            </div>
            <div class="deskripsi">
               Perencanaan
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