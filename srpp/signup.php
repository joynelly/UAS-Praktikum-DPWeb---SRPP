<?php
    require './model/DB.php';
    require './model/Input.php';
    require './model/Validate.php';
    require './model/User.php';

    $DB = DB::getInstance();

    $user = new User();

    if (!empty($_POST)) { // form submitted
        $error_message = $user->validate($_POST);
        if (empty($error_message)) {
          $user->insert();
          session_start();
          $_SESSION["username"] = $user->getItem('username');
          //$message = urlencode("Mahasiswa dengan nama <b>{$user->getItem('nama')}</b>, Nim <b>{$user->getItem('email')}</b> sudah berhasil ditambahkan");
          header("Location:register.php?id={$user->getItem('username')}");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/style.css" />
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
        if (isset($error_message) && $error_message !== "") {
            echo "<div class=\"alert alert-danger mb-3\">
            <ul class=\"m-0\">";
            foreach ($error_message as $message) {
                echo "<li>$message</li>";
            }
            echo "</ul></div>";
        }
    ?>

    <!-- form sign up -->
    <div class="container sign">
        <form action="<?php echo $_SERVER["REQUEST_URI"]; ?>" method="post">
            <h1>Sign Up</h1>
            <p>Already Registered? <a href="signin.php"><u>Sign in</u></a></p>

            <label>EMAIL</label><br>
            <input placeholder="Email" type="text" id="email" name="email"
                value="<?php echo $user->getItem('email'); ?>" />

            <label>USERNAME</label><br>
            <input placeholder="Username" type="text" id="username" name="username"
                value="<?php echo $user->getItem('username'); ?>"/>

            <label>PASSWORD</label><br>
            <input placeholder="Password" type="password" id="password" name="password"
                value="<?php echo $user->getItem('password'); ?>"/>

                <input type="submit" name="submit" value="Sign Up" class="btn btn-primary" class="btn">
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

<script src="./assets/script.js"></script>
</html>