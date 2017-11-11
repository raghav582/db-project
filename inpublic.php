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