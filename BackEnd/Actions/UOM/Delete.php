<?php
	include'../connection.php';
	mysqli_query($connection,"DELETE FROM uom WHERE uom_id='".$_POST['id']."'");
?>