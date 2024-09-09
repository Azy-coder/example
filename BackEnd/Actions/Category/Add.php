<?php
session_start();
	include'../connection.php';
	// $q=mysqli_query($con,"SELECT oid FROM tblOffices WHERE Offices='".$_POST['Office']."'");
	// $rows=mysqli_fetch_array($q);
	if($_POST['p_id']==''){
		mysqli_query($connection,"INSERT into category values (null,'".$_POST['CatDesc']."')");
	}
	else{
		mysqli_query($connection,"UPDATE category set cat_desc='".$_POST['CatDesc']."' WHERE cat_id='".$_POST['p_id']."'");
	}
?>