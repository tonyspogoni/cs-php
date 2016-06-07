
<?php

/*Don't forget to create a user for your database
CREATE USER 'steve'@'localhost' IDENTIFIED BY 'nerdface';
GRANT INSERT, SELECT, UPDATE, DELETE ON movies.* TO 'steve'@'localhost';
flush privileges
*/
$dbHost = "";
$dbPort = "";
$dbUser = "";
$dbPassword = "";

$dbName = 'pokemon';

$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST');
if ($openShiftVar === null || $openShiftVar == "")
{
	// Not in the openshift environment
	$dbHost = "localhost";
	$dbHost = 'localhost';
	$dbUser = 'steve';
	$dbPassword = 'nerdface';
}
else
{
	// In the openshift environment
	$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
	$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
	$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
	$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
}

try {
	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
} catch (Exception $e) {
	echo $e;
	die();
}

//require("databasegrab.php");
//$db = connectToDb();

$name = htmlspecialchars($_POST['name']);
$type = htmlspecialchars($_POST['type']);
$pokedexNum = htmlspecialchars($_POST['pokedexNum']);
$query = "INSERT INTO Pokemon(Name, pokedexNum) VALUES (:name, :pokedexNum)";
$stmt = $db->prepare($query);
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":pokedexNum", $pokedexNum, PDO::PARAM_INT);
$stmt->execute();
//$query2 = "INSERT INTO Type(TYPE) VALUES (:type)";
$query2 = "SELECT * FROM Pokemon p JOIN Pokemon_Type pt ON p.ID = pt.POKEMON_ID JOIN Type t ON pt.TYPE_ID = t.ID; INSERT INTO pt(TYPE_ID) VALUES(t.ID) where t.TYPE = :type ";
$stmt2 = $db->prepare($query2);
$stmt2->bindValue(":type", $type, PDO::PARAM_STR);
$stmt2->execute();

echo "got er done";
header("Location: databasegrab.php");
die("Page should have been redirected");


?>
