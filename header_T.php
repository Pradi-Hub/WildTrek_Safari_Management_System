<!DOCTYPE html>
<html lang="en">
    <!--header section-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation and footer</title>
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="./main_T.css">
    <link rel="stylesheet" href="./main2_T.css">

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="./main_T.js"></script>
</head>
<body>
<?php
         require_once 'dbh.inc.php';
         session_start();
         $Username = $_SESSION['userName'];
         
         ?>
    
    <header>
        <p>WildTrek - Best Under Sri Lankan Sky</p>
        <!-- navigation bar-->
        <nav>
            <div class="pic">
                <img src="./Images_T/download.png" alt="logo" width="32px" height="32px">
                <h1 class="logo">WILD<span>TREK</span></h1>
            </div>

            <input type="checkbox" name="" id="menu">
            <label for="menu"><i class="fas fa-bars"></i></label>
            <label for="menu"><i class="fas fa-times"></i></label>

            <ul class="menu">
                <li><a href="./r_main2.php">Home</a></li>
                <li><a href="./view_packages_T_pradi.php">Safari Hotels</a></li>
                <li class="drop"><a href="#">Safari Tours<i class="fa-solid fa-caret-down"></i></a>
                    <ul class="submenu">
                        <li><a href="./r_jeepreservation.html">Safari Jeep Reservation</a></li>
                        <li><a href="./r_campingreservation.html">Camping Reservation</a></li>
                    </ul>
                </li>
                <li><a href="./Acontact.php">Contact Us</a></li>
                <li><a href="./r_ourteam.php">Meet our team</a></li>
                <li><a href="./Aaboutus.php">About Us</a></li>
                 <?php if(isset($Username)){ ?>
                        <li class="sign"><a href="./s_viewprofile.php"><?php echo "HI " . $Username; ?></a></li>
                    <?php } else { ?>
                        <li class="sign"><a href="./s_loginForm.html">Login</a></li>
                        <li class="sign"><a href="./s_RegisterForm.html"><i class="fa-solid fa-user-plus"></i> Sign Up</a></li>
                    <?php } ?>
                

                <!-- <li class="sign"><i class="fa-solid fa-user"></i></a></li> -->
            </ul>
        </nav>
    </header>
    
    <!--content section-->
    <div class="T_content" id="T_idContent" >
        <p>
        <br> <br> <br> <br><br>
        <div class="background_image">
            
            