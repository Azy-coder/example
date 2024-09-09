<?php
session_start();
	include'../connection.php';
	$q=mysqli_query($connection,"SELECT * FROM security WHERE username='".$_SESSION['u']."'");
  	$rows=mysqli_fetch_array($q);
	if($_POST['p_id']==''){
		if($rows[2]=='Administrator'){
			mysqli_query($connection,"INSERT into items values (null,'".$_POST['Category']."','".$_POST['itemDesc']."','".$_POST['QTY']."','".$_POST['UOM']."','".$_SESSION['u']."','".date('Y-m-d')."','1','".$_POST['Price']."','')");
			echo 'admin';
		}
		else{
			mysqli_query($connection,"INSERT into items values (null,'".$_POST['Category']."','".$_POST['itemDesc']."','".$_POST['QTY']."','".$_POST['UOM']."','".$_SESSION['u']."','".date('Y-m-d')."','0','".$_POST['Price']."','')");
		//	echo 'user';
		}
	}
	else{
		mysqli_query($connection,"UPDATE items set cat_id='".$_POST['Category']."', item_name='".$_POST['itemDesc']."', qty='".$_POST['QTY']."', uom_id='".$_POST['UOM']."' WHERE item_id='".$_POST['p_id']."'");
	}
	

?>