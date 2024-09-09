<?php 
include'connection.php';
mysqli_query($connection,"UPDATE security set status='1' WHERE username='".$_GET['u']."'");
header("location:../login.php");
?>