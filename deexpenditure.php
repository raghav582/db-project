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
		//expenditure
		$stmt=$conn->prepare("DELETE FROM expenditure
		WHERE gpname=:gpname AND source=:source
		");
		$stmt->bindParam(':gpname',$gpname);
		$stmt->bindParam(':source',$esource);
		
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$gpname=$_REQUEST['gpname'];
			$esource=$_REQUEST['esource'];
			$stmt->execute();
		}
		
		echo "database deleted sucessfully";
		}
		}
	}
	
	catch(PDOException $e)
	{
		echo "<br>".$e->getMessage();
	}
?>