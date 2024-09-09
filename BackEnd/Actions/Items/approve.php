<?php
	include'../connection.php';
	mysqli_query($connection,"UPDATE items set status='1' WHERE item_id='".$_POST['id']."'");
?>