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
		
		//Revenue
		$stmt=$conn->prepare("INSERT INTO revenue(gpname,source,amount)
		VALUES(:gpname,:source,:amount)
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':source',$rsource);
		$stmt->bindParam(':amount',$ramount);
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$gpname=$_REQUEST['gpname'];
			$rsource=$_REQUEST['rsource'];
			$ramount=$_REQUEST['ramount'];
			$stmt->execute();
		}
		
		//expenditure
		$stmt=$conn->prepare("INSERT INTO expenditure(gpname,source,amount)
		VALUES(:gpname,:source,:amount)
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':source',$esource);
		$stmt->bindParam(':amount',$eamount);
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$gpname=$_REQUEST['gpname'];
			$esource=$_REQUEST['esource'];
			$eamount=$_REQUEST['eamount'];
			$stmt->execute();
		}
		
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
		
		//infrastructure
		$stmt=$conn->prepare("INSERT INTO infrastructure(gpname,school,watersupply,electricity,hospital)
		VALUES(:gpname,:school,:watersupply,:electricity,:hospital)
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':school',$school);
		$stmt->bindParam(':watersupply',$watersupply);
		$stmt->bindParam(':electricity',$electricity);
		$stmt->bindParam(':hospital',$hospital);
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$gpname=$_REQUEST['gpname'];
			$school=$_REQUEST['school'];
			$watersupply=$_REQUEST['watersupply'];
			$electricity=$_REQUEST['electricity'];
			$hospital=$_REQUEST['hospital'];
			$stmt->execute();
		}
		
		//public work
		$stmt=$conn->prepare("INSERT INTO publicwork(gpname,townhall,sportcenter,library)
		VALUES(:gpname,:townhall,:sportcenter,:library)
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':townhall',$townhall);
		$stmt->bindParam(':sportcenter',$sport);
		$stmt->bindParam(':library',$library);
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$gpname=$_REQUEST['gpname'];
			$townhall=$_REQUEST['townhall'];
			$sport=$_REQUEST['sport'];
			$library=$_REQUEST['library'];
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