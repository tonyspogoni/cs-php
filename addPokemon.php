
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
$query = "INSERT INTO Pokemon(Name, pokedexNum) VALUES (:name, :pokedexNum)"; "INSERT INTO Pokemon_Type (TYPE_ID,POKEMON_ID) SELECT t.ID, p.ID from Pokemon p INNER JOIN Type t on pt.POKEMON_ID = p.ID WHERE p.Name = :name INNER JOIN Pokemon_Type pt on pt.POKEMON_ID = t.ID WHERE t.TYPE = :type ";
//$query2 = "INSERT INTO Pokemon_Type(TYPE_ID,POKEMON_ID) SELECT	(SELECT ID FROM Type WHERE TYPE = :type) SELECT (ID FROM Pokemon WHERE Name = :name )";
$stmt = $db->prepare($query);
$stmt->nextRowset();
$stmt->bindValue(":name", $name, PDO::PARAM_STR);
$stmt->bindValue(":pokedexNum", $pokedexNum, PDO::PARAM_INT);
$stmt->bindValue(":type", $type, PDO::PARAM_STR);
$stmt->execute();

$query2 = "INSERT INTO Pokemon_Type(TYPE_ID,POKEMON_ID) 	SELECT (ID FROM Type WHERE TYPE = :type) SELECT (ID FROM Pokemon WHERE Name = :name )";
//$stmt = $db->prepare($query);
$stmt->bindValue(":type", $type, PDO::PARAM_STR);

//$query3 = "INSERT INTO Pokemon_Type(POKEMON_ID) SELECT ID FROM Pokemon WHERE Name = :name";
//$stmt3 = $db->prepare($query3);
//$stmt3->bindValue(":name", $name, PDO::PARAM_STR);
//$stmt3->execute();

echo "got er done";
header("Location: databasegrab.php");
die("Page should have been redirected");


?>
