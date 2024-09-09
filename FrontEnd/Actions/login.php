<?php
session_start();
include'connection.php';

$q=mysqli_query($connection,"SELECT * FROM security WHERE username='".$_POST['username']."' and password='".$_POST['password']."' and status='1'");
$rC=mysqli_num_rows($q);
if($rC>0){
$rows = mysqli_fetch_array($q);
$_SESSION['u']=$rows[0];
	if($rows[2]=='Administrator'){
		echo "A";	
	}
	else if($rows[2]=='User'){
		echo "B";
	}	
	else{
		echo "C";
	}	
}
else
{
	echo "D";
}
?>