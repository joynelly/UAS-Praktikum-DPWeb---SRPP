<?php

    // redirect to index.php if user has logged
    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: student_index.php");
    }

    require './model/DB.php';
    require './model/Input.php';
    require './model/Validate.php';
    require './model/User.php';

    $DB = DB::getInstance();
    $user = new User();

    if (!empty($_POST)) { // form submitted
        $error_message = $user->validate($_POST);
        $cekuser = $DB->getWhereOnce("user", ['username','=',$user->getItem('username')]);
        if ($DB->getWhereOnce("user", ['username','=',$user->getItem('username')]) == true) {
            if ($cekuser->password == $user->getItem('password')) {
                if ($cekuser->role == 'Student') {
                    $_SESSION["username"] = $user->getItem('username');
                    $message = urlencode("Studeng berhasil Login dengan username <b>{$user->getItem('username')}</b>.");
                    header("Location:student_index.php?message={$message}");
                } else {
                    $_SESSION["username"] = $user->getItem('username');
                    $message = urlencode("Admin berhasil Login dengan username <b>{$user->getItem('username')}</b>.");
                    header("Location:admin_index.php?message={$message}");
                }
            } else {
                $message = urlencode("Password yang anda masukkan tidak sesuai dengan username <b>{$user->getItem('username')}</b>.");
                header("Location:login.php?gagal={$message}");
            }
        } else {
            $message = urlencode("Tidak ada user dengan username <b>{$user->getItem('username')}</b>.");
            header("Location:login.php?gagal={$message}");
        }
    }
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-in | SRPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
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
           <a href="index.php">SRPP</a>
        </div>
        <div class="nav-items">
           <li><a href="index.php">Home</a></li>
           <li><a href="about.html">About</a></li>
        </div>
     </nav>
    <!-- header area end -->

    <?php
        if (Input::get('message') !== "") {
            echo "<div class=\"alert alert-success
            my-3\">".Input::get('message')."</div>";
        }elseif (Input::get('gagal') !== "") {
            echo "<div class=\"alert alert-danger
            my-3\">".Input::get('gagal')."</div>";
        }
    ?>

    <!-- form login -->
    <div class="container sign">
        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
            <h1>Sign In</h1>
            <p>Sign in to continue</p>
            
            <label for="username">USERNAME</label>
            <input name="username" placeholder="Username" type="text" id="username">

            <label for="password">PASSWORD</label><br>
            <input name="password" id="password" placeholder="Password" type="password">

            <button type="submit" class="btn">Sign in</button>
            <h5>New to SRPP? <a href="signup1.html"><u>Join now</u></a></h5>
        </form>
    </div>
    <!-- form login end -->

    <!-- Footer start -->
    <footer class="footer">
        <div class="container">
            <span>&copy;SRPP | Tugas Besar RPL | Kelompok 8 </span>
        </div>
    </footer>
  <!-- Footer end -->
</body>

<script src="assets/script.js"></script>
</html>