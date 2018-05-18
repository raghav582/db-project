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