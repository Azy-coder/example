<?php
	include'../connection.php';
	// $q=mysqli_query($con,"SELECT oid FROM tblOffices WHERE Offices='".$_POST['Office']."'");
	// $rows=mysqli_fetch_array($q);
	if($_POST['p_id']==''){
		mysqli_query($connection,"INSERT into uom values (null,'".$_POST['UomDesc']."')");

	}
	else{
		mysqli_query($connection,"UPDATE uom set uom_desc='".$_POST['UomDesc']."' WHERE uom_id='".$_POST['p_id']."'");
	}
	

?>