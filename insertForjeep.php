<?php
   include 'dbh.inc.php';
   session_start();
   $UserID = $_SESSION['uID'];
?>

<?php
   include 'dbh.inc.php';

   if(isset($_POST['create'])) {
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $date = $_POST['date'];
      $country = $_POST['country'];
      $location = $_POST['location'];
      $package = $_POST['package'];
      $Participants = $_POST['Participants'];
      $tourguide = $_POST['tourguide'];
      $duration = $_POST['duration']; 
      $request = $_POST['request'];

      $uname = $_SESSION['userName'];  
      $sql = "INSERT INTO jeepreservation(name, phone, email, date, country,loacation,package,Participants,tourguide,duration,request,userName) 
      VALUES('$name','$phone','$email','$date','$country','$location','$package','$Participants','$tourguide','$duration','$request','$uname')";

      $result = mysqli_query($conn,$sql);

      if($result) {
         header('location:viewjeepdetails.php');
      }
      else {
         die(mysqli_error($conn));
      }
   }

   if(isset($_POST['update'])) {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $date = $_POST['date'];
      $country = $_POST['country'];
      $location = $_POST['loacation'];
      $package = $_POST['package'];
      $Participants = $_POST['Participants'];
      $tourguide = $_POST['tourguide'];
      $duration = $_POST['duration'];
      $request = $_POST['request'];

      $uname = $_SESSION['userName'];

      $sql = "UPDATE jeepreservation SET name = '$name', phone = '$phone', email = '$email', date = '$date', country = '$country', loacation = '$location', package = '$package' , Participants = '$Participants', tourguide = '$tourguide' , duration = '$duration', request = '$request' WHERE id='$id'";

      $result = mysqli_query($conn,$sql);

      if($result) {
         header('location:viewjeepdetails.php');
      }
      else {
         die(mysqli_error($conn));
      }
   }
?>