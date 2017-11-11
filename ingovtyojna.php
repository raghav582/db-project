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
		//govt yojna
		$stmt=$conn->prepare("INSERT INTO govtyojna(gpname,IGAY,UjwallaYojna,MNREGA)
		VALUES(:gpname,:IGAY,:UjwallaYojna,:MNREGA)
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':IGAY',$igay);
		$stmt->bindParam(':UjwallaYojna',$ujwalla);
		$stmt->bindParam(':MNREGA',$mnrega);
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$gpname=$_REQUEST['gpname'];
			$igay=$_REQUEST['igay'];
			$ujwalla=$_REQUEST['ujwalla'];
			$mnrega=$_REQUEST['mnrega'];
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