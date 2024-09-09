<?php
	include'../connection.php';
	mysqli_query($connection,"DELETE FROM category WHERE cat_id='".$_POST['id']."'");
?>