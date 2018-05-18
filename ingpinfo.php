<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "grampanchayat";
	$gpname=$sarpanch=$secretary=$population=$area=$rsource=$ramount=$esource=$eamount=$school=$watersupply=$electricity=$hospital=$igay=$ujwalla=$mnrega=$townhall=$library=$sport="";
	try{
		$conn =new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		//required
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
		if(empty($_POST["gpname"]))
			echo "Gram Panchayat Name required.";
		else
		{
		//Gp Info
		$stmt=$conn->prepare("INSERT INTO gpinfo(gpname,sarpanch,secretary,population,area)
		VALUES(:gpname,:sarpanch,:secretary,:population,:area)
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':sarpanch',$sarpanch);
		$stmt->bindParam(':secretary',$secretary);
		$stmt->bindParam(':population',$population);
		$stmt->bindParam(':area',$area);
		
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$gpname=$_REQUEST['gpname'];
			$sarpanch=$_REQUEST['sarpanch'];
			$secretary=$_REQUEST['secretary'];
			$population=$_REQUEST['population'];
			$area=$_REQUEST['area'];
			$stmt->execute();
		}
		
		echo "database created sucessfully";
		}
		}
	}
	
	catch(PDOException $e)
	{
		echo "<br>".$e->getMessage();
	}
?>