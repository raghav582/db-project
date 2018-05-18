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
		
		echo "database updated sucessfully";
		}
		}
	}
	
	catch(PDOException $e)
	{
		echo "<br>".$e->getMessage();
	}
?>