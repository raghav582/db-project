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
		echo "database created sucessfully";
		}
		}
	}
	
	catch(PDOException $e)
	{
		echo "<br>".$e->getMessage();
	}
?>