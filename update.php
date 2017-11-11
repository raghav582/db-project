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
		if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["sarpanch"]))
		{
		$stmt=$conn->prepare("UPDATE gpinfo
		SET sarpanch=:sarpanch
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':sarpanch',$sarpanch);
			$gpname=$_REQUEST['gpname'];
			$sarpanch=$_REQUEST['sarpanch'];
			$stmt->execute();
		}
		if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["secretary"]))
		{
		$stmt=$conn->prepare("UPDATE gpinfo
		SET secretary=:secretary
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':secretary',$secretary);
		
			$gpname=$_REQUEST['gpname'];
			$secretary=$_REQUEST['secretary'];
			$stmt->execute();
		}
		if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["population"]))
		{
		$stmt=$conn->prepare("UPDATE gpinfo
		SET population=:population
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':population',$population);
		
			$gpname=$_REQUEST['gpname'];
			$population=$_REQUEST['population'];
			$stmt->execute();
		}
		if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["area"]))
		{
		$stmt=$conn->prepare("UPDATE gpinfo
		SET area=:area
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':area',$area);
		
			$gpname=$_REQUEST['gpname'];
			$area=$_REQUEST['area'];
			$stmt->execute();
		}
		
		//Revenue
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["ramount"]))
		{
		$stmt=$conn->prepare("UPDATE revenue
		SET amount=:amount
		WHERE gpname=:gpname AND source=:source
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':source',$rsource);
		$stmt->bindParam(':amount',$ramount);
		
			$gpname=$_REQUEST['gpname'];
			$rsource=$_REQUEST['rsource'];
			$ramount=$_REQUEST['ramount'];
			$stmt->execute();
		}
		
		//expenditure
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["eamount"]))
		{
		$stmt=$conn->prepare("UPDATE expenditure
		SET amount=:amount
		WHERE gpname=:gpname AND source=:source
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':source',$esource);
		$stmt->bindParam(':amount',$eamount);
		
			$gpname=$_REQUEST['gpname'];
			$esource=$_REQUEST['esource'];
			$eamount=$_REQUEST['eamount'];
			$stmt->execute();
		}
		
		//govt yojna
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["igay"]))
		{
		$stmt=$conn->prepare("UPDATE govtyojna
		SET IGAY=:IGAY
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':IGAY',$igay);
		
			$gpname=$_REQUEST['gpname'];
			$igay=$_REQUEST['igay'];
			$stmt->execute();
		}
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["ujwalla"]))
		{
		$stmt=$conn->prepare("UPDATE govtyojna
		SET UjwallaYojna=:UjwallaYojna
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':UjwallaYojna',$ujwalla);
		
			$gpname=$_REQUEST['gpname'];
			$ujwalla=$_REQUEST['ujwalla'];
			$stmt->execute();
		}
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["mnrega"]))
		{		
		$stmt=$conn->prepare("UPDATE govtyojna
		SET MNREGA=:MNREGA
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':MNREGA',$mnrega);

			$gpname=$_REQUEST['gpname'];
			$mnrega=$_REQUEST['mnrega'];
			$stmt->execute();
		}
		
		//infrastructure
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["school"]))
		{
		$stmt=$conn->prepare("UPDATE infrastructure
		SET school=:school
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':school',$school);
		
			$gpname=$_REQUEST['gpname'];
			$school=$_REQUEST['school'];
			$stmt->execute();
		}
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["watersupply"]))
		{
		$stmt=$conn->prepare("UPDATE infrastructure
		SET watersupply=:watersupply
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':watersupply',$watersupply);
		
			$gpname=$_REQUEST['gpname'];
			$watersupply=$_REQUEST['watersupply'];
			$stmt->execute();
		}
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["electricity"]))
		{
		$stmt=$conn->prepare("UPDATE infrastructure
		SET electricity=:electricity
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':electricity',$electricity);
		
			$gpname=$_REQUEST['gpname'];
			$electricity=$_REQUEST['electricity'];
			$stmt->execute();
		}
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["hospital"]))
		{
		$stmt=$conn->prepare("UPDATE infrastructure
		SET hospital=:hospital
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':hospital',$hospital);
		
			$gpname=$_REQUEST['gpname'];
			$hospital=$_REQUEST['hospital'];
			$stmt->execute();
		}
		
		//public work
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["townhall"]))
		{
		$stmt=$conn->prepare("UPDATE publicwork
		SET townhall=:townhall
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':townhall',$townhall);
		
			$gpname=$_REQUEST['gpname'];
			$townhall=$_REQUEST['townhall'];
			$stmt->execute();
		}
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["sport"]))
		{
		$stmt=$conn->prepare("UPDATE publicwork
		SET sportcenter=:sportcenter
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':sportcenter',$sport);
		
			$gpname=$_REQUEST['gpname'];
			$sport=$_REQUEST['sport'];
			$stmt->execute();
		}
		if($_SERVER["REQUEST_METHOD"]=="POST" && !empty($_POST["library"]))
		{
		$stmt=$conn->prepare("UPDATE publicwork
		SET library=:library
		WHERE gpname=:gpname
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':library',$library);
		
			$gpname=$_REQUEST['gpname'];
			$library=$_REQUEST['library'];
			$stmt->execute();
		}
		echo "database updated sucessfully";
		}
		}
	}
	
	catch(PDOException $e)
	{
		echo "<br>".$e->getMessage();
	}
?>