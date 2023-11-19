<?php

  session_start();
 
  include 'dbh.inc.php';


  
  
  // Check if the form is submitted
  if (isset($_POST['login'])) {
    $uName = $_POST['userName'];
    $pwd = $_POST['password'];
    $accType = 'account';

    // Read the user data from the database
    $sql = "SELECT * FROM users WHERE userName = '$uName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedHashedPassword = $row['Password'];

        // Verify the entered password against the stored hashed password
        if (password_verify($pwd, $storedHashedPassword)) {
            if ($row['status'] == 'Deactivate') {
                echo "Your account is currently deactivated. Please contact the administrator.";
            } else {
                $_SESSION['loggedIn'] = true;
                echo "Login successful";
                $_SESSION["userName"] = $uName;
                $_SESSION['uID'] = $row['user_ID'];

                if ($row['account'] == 'admin') {
                    header('Location: s_adminpanel.php'); // Redirect to admin page
                    exit();
                } else {
                    header('Location: s_homepage2.php'); // Redirect to customer page
                    exit();
                }
            }
        } else {
            // Passwords don't match, login failed
            echo "Login failed!!";
        }
    } else {
        // User not found, handle the case when the provided username is invalid
        echo "Invalid username or password!!";
    }

    $conn->close();
}
?>