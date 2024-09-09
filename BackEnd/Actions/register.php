<?php
session_start();
include'connection.php';

$q=mysqli_query($connection,"SELECT * FROM security WHERE username='".$_POST['username']."'");
$rC=mysqli_num_rows($q);
if($rC==0){
mysqli_query($connection,"INSERT INTO security values ('".$_POST['username']."','".$_POST['password']."','User','0')");
mysqli_query($connection,"INSERT INTO accounts(username) values ('".$_POST['username']."'");
$to = $_POST['username'];
$subject = "Email Verification";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= "From: sender@example.com" . "\r\n";
$message = '
<html>
<head>
    <title>Email with Bootstrap Button</title>
    <style>
        /* Add your inline CSS here if needed */
        .btn {
            padding: 8px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Email Verification!</h1>
    <p>Click the button to verify your email!</p>
    <a href="localhost/BES/Actions/updateemail.php?u='.$_POST['username'].'" class="btn">Verify</a>
</body>
</html>
';
mail($to, $subject, $message, $headers);
	echo "A";
}
else{
	echo "B";
}



?>