<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grampanchayat";
$user=$pass="";
try{
// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
	$user=$_REQUEST['user'];
	$pass=$_REQUEST['pass'];
	$stmt=$conn->prepare("SELECT password FROM login WHERE user='$user'");
	$stmt->execute();
	$result=$stmt->fetch(PDO::FETCH_BOTH);
	$pass=$result['password'];
	}
	if($_POST["pass"]==$pass && !empty($_POST["user"]))
	{
		echo file_get_contents("option.html");
	}
	else
		echo "username or password is  invalid.";
}
catch(PDOException $e){
	echo "error:".$e->getMessage();
}

$conn=null;
?>