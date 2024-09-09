<?php
	include'../connection.php';
	$q=mysqli_query($connection,"SELECT * FROM security WHERE username='".$_POST['id']."'");
	$rows=mysqli_fetch_array($q);
	if($rows[3]=='1'){
		mysqli_query($connection,"UPDATE security set status='0' WHERE username='".$_POST['id']."'");
	}
	else{
		mysqli_query($connection,"UPDATE security set status='1' WHERE username='".$_POST['id']."'");
	}
?>