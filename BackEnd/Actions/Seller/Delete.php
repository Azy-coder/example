<?php
	include'../connection.php';
	mysqli_query($connection,"DELETE FROM subjects WHERE subjectcode='".$_POST['id']."'");
?>