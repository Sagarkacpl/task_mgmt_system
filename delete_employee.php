<?php
session_start();
error_reporting(0);
include "include/dbconn.php";
$admin_id = $_SESSION['admin_id'];
   if (empty($admin_id)) {
       header("Location: index.php");
   }
   $ID = $_GET['id'];   
   $query = mysqli_query($db, "UPDATE `users` SET DeletedStatus='1' WHERE ID='$ID'");
if ($query) {
    echo "<script>alert('Record Successfully Deleted')</script>";
    echo "<script>window.location.href='employee.php'</script>";
} else {
    echo "<script>alert('Can not Deleted, Please try again')</script>";
} 
?>