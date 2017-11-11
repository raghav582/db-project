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
		echo "database updated sucessfully";
		}
		}
	}
	
	catch(PDOException $e)
	{
		echo "<br>".$e->getMessage();
	}
?>