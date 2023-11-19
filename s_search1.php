<?php

include 'dbh.inc.php';
session_start();
$UserID = $_SESSION['uID'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation and footer</title>
    <link rel="stylesheet" href="s_css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel = "stylesheet" href = "./s_css/s_useradmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src = "./s_js/s_delete.js"></script>

</head>
<body>
    <header>
    <p id="demo"></p>
        <p>WildTrek - Best Under Sri Lankan Sky</p>
        <!-- navigation bar-->
        <nav>
            <div class="pic">
                <img src="./s_images/download.png" alt="logo" width="32px" height="32px">
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
                        <li><a href="#">Safari Jeep Reservation</a></li>
                        <li><a href="#">Camping Reservation</a></li>
                    </ul>
                </li>
                <li><a href="./Acontact.php">Contact Us</a></li>
                <li><a href="#">Reserve Tours</a></li>
                <li><a href="./P_reserve.php">Reserve Hotels</a></li>
                <li class = "sign"><a href ="./s_viewprofile.php">Hi, <?php echo $_SESSION['userName']; ?></a></li>
                <li class="sign"><a href="./s_RegisterForm.html"><i class="fa-solid fa-user-plus"></i> Logout</a></li>

            </ul>
        </nav>
    </header>
        <br> <br> <br> <br> <br> <br>

    
    <?php
  
  include 'dbh.inc.php';

        if(isset($_POST['search'])){
            $search = mysqli_real_escape_string($conn,$_POST['search']);
            $sql ="SELECT * FROM users  WHERE uID LIKE '%$search%' OR userName LIKE '%$search%'";
            $result = mysqli_query($conn,$sql);
            $queryResult = mysqli_num_rows($result);

            echo "There are " .$queryResult."results!!";

            if($queryResult > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<table class='table' border='1' width='90%'>
                <tr>
                <th><uID:</th><br>
                <th>Full Name:</th><br>
                <th>User Name:<</th><br>
                <th>Email:</th><br>
                <th>citizen type:</th><br>
                <th>Gender:</th><br>
                <th>NIC/Passport No:</th><br>
                <th>Contact No:</th><br>
                <th><Status:</th><br>
                <th>Account Type:</th><br>
                </tr>";
                
                    echo" <tr>
        
                            <td>".$row["uID"]." </td>
                            <td>".$row["fullName"]." </td>
                            <td>".$row["userName"]." </<td>
                            <td>".$row["email"]." </td>
                            <td>".$row["cType"]."  </td>
                            <td>".$row["gender"]."  </td>
                            <td>".$row["nicPass"]." </td>
                            <td>".$row["contactNo"]." </td>
                            <td>".$row["status"]." </td>
                            <td>".$row["account"]." </td>
                            <td>
                                <a href='s_profileEdit.php?ID=$row[uID]'> <input class='button' type='submit' name='active' value='Activate' </a> 
                                <a href='s_deleteProfile.php?ID=$row[uID]'> <input class='button' type='submit' name='deactive' value='Deactivate' onclick='myFunction()'> </a>	
                               </td>
                            
                               
                    </tr>";
                	
            }
                    echo "</table>";
        }
        
        else{
            echo "There are no results matching your search!!";
        }
    }
    
        ?>

<br> <br> <br> <br> <br> <br>
<br> <br> <br> <br> <br> <br>
      
      <!--Footer-->
    <footer>
        <div class="Mcontent">
            <div class="left box">
                <h2>About Us</h2>
                <div class="content">
                    <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                    Delectus voluptates sapiente, consectetur id quos reiciendis
                    omnis, ab, ex unde sequi earum dignissimos. Sit architecto 
                    blanditiis impedit dolores harum quam. Inventore sed eaque 
                    libero et, similique repellendus exercitationem quos nihil 
                    totam dolore, laudantium facilis nostrum modi assumenda hic 
                    dolores, rerum nulla!</P>

                    <div class="social">
                        <a href="#"><i class="fa-brands fa-facebook"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                    </div>
    
                    <div class="terms">
                        <a href="#">Terms and conditions | </a>
                        <a href="#">Privacy policy | </a>
                        <a href="#">FAQ</a>
                    </div>
                </div>

            </div>

            <div class="center box">
                <h2>Contact Us</h2>
                <div class="content">
                    <div class="place">
                        <span class="fas fa-map-marker-alt"></span>
                        <span class="text">
                            No.122/A Malabe, Colombo
                        </span>
                    </div>
                    <div class="phone">
                        <span class="fas fa-phone-alt"></span>
                        <span class="text">
                            +94773322443
                        </span>
                    </div>
                    <div class="email">
                        <span class="fas fa-envelope"></span>
                        <span class="text">
                            info@wildtrek.com
                        </span>
                    </div>
                    <div class="latest">
                        <img src="s_images/5.avif" alt="" width="100px" height="80px">
                        <img src="s_images/5.jpg" alt="" width="100px" height="80px">
                        <img src="s_images/6.jpg" alt="" width="100px" height="80px">
                        <img src="s_images/8.jpg" alt="" width="100px" height="80px">
                    </div>
                </div>
            </div>

            <div class="right box">
                <h2>News Letter</h2>
                <div class="content">
                    <form action="">
                        <div class="email">
                            <input type="email" placeholder="Your Email" required>
                        </div>
                        <div class="btn">
                            <button type="submit">Send</button>
                        </div>
                    </form>
                    <div class="logo2">
                    <img src="s_images/download.png" alt="logo" width="32px" height="32px">
                    <h1>WILD<span>TREK</span></h1>
                    </div>

                    <div class="top"> 
                        <a href="#"><i class="fa-solid fa-arrow-up"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom">
            <div>
                <span class="credit">
                    Designed & Developed By
                    <a href="">Team Wild-Trek</a>
                    |
                </span>
                <span>
                    &copy;
                </span>
                <span>
                    2023 All Right Reserved
                </span>
            </div>
        </div>

    </footer>

    <script src="s_js/main.js"></script>
</body>
</html>