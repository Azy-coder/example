<?php
	include'../connection.php';
	// $q=mysqli_query($con,"SELECT oid FROM tblOffices WHERE Offices='".$_POST['Office']."'");
	// $rows=mysqli_fetch_array($q);
	if($_POST['p_id']==''){
		mysqli_query($connection,"INSERT into subjects values (null,'".$_POST['Subject']."','".$_POST['Subject']."')");

	}
	else{
		mysqli_query($connection,"UPDATE subjects set subjectdescription='".$_POST['Subject']."' WHERE subjectcode='".$_POST['p_id']."'");
	}
	

?>