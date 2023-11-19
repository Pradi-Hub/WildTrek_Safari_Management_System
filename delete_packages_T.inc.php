<?php
if(isset($_GET['delete']) && !empty($_GET['delete'])){
    $package_Id=$_GET['delete'];

    require_once 'dbh.inc.php';
    require_once 'functions_T.inc.php';


    deletePackage($conn,$package_Id);
    
}else {
    echo "Error: Image file is not deleted.";
}