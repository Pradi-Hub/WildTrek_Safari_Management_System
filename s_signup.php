<?php
 

 include 'dbh.inc.php';

 $uName = $_POST['userName'];
 $fullName = $_POST['fullName'];
 $Email = $_POST['email'];
 $pwd = $_POST[ 'password'];
 $type = $_POST['citizens'];
 $gender = $_POST['gender'];
 $nic = $_POST['nic'];
 $phone = $_POST['contact'];
 $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
 
 createUser($uName,$fullName,$Email,$hashedPassword,$type,$gender,$nic,$phone);
 
 function createUser($uName,$fullName,$Email,$hashedPassword,$type,$gender,$nic,$phone) {
	 global $conn;
	 $sql ="INSERT INTO users(userName,fullName,email, Password ,cType,gender,nicPass,contactNo) VALUES('$uName','$fullName','$Email','$hashedPassword','$type','$gender','$nic','$phone')";
		 
	 if($conn->query($sql))
		 {
			 echo "Inserted Successfully ";
			 header ("Location:s_loginForm.html");
		 }
		 else{
			 echo "Error:".$conn->error;
		 }
	 }
 
	 $conn->close();
	 ?>
 
 

























?>