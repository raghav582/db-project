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
		echo "database updated sucessfully";
		}
		}
	}
	
	catch(PDOException $e)
	{
		echo "<br>".$e->getMessage();
	}
?>