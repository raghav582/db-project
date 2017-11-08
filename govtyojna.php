<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>gpname</th><th>IGAY</th><th>UjwallaYojna</th><th>MNREGA</th></tr>";
class TableRows extends RecursiveIteratorIterator { 
    function __construct($it) { 
        parent::__construct($it, self::LEAVES_ONLY); 
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() { 
        echo "<tr>"; 
    } 

    function endChildren() { 
        echo "</tr>" . "\n";
    } 
} 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grampanchayat";
$gpname=$source=$rupees="";
try{
// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$gpname=$_REQUEST['gpname'];

$stmt=$conn->prepare("SELECT gpname, IGAY, UjwallaYojna, MNREGA FROM govtyojna WHERE gpname='$gpname'");
$stmt->execute();
$result = $stmt->setFetchMode( PDO::FETCH_ASSOC); 
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
        echo $v;		
}
}
}
catch(PDOException $e){
	echo "error:".$e->getMessage();
}

$conn=null;
echo "</table>";
?>
