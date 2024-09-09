<?php
	include'../connection.php';

	$q=mysqli_query($connection,"SELECT * FROM subjects WHERE subjectcode='".$_POST['id']."'");
	$rows=mysqli_fetch_array($q);
	echo json_encode($rows);
?>