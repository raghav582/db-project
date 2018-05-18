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
		echo "database updated sucessfully";
		}
		}
	}
	
	catch(PDOException $e)
	{
		echo "<br>".$e->getMessage();
	}
?>