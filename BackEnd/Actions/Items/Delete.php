<?php
	include'../connection.php';
	mysqli_query($connection,"DELETE FROM items WHERE item_id='".$_POST['id']."'");
?>