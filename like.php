<?php
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
 $name = htmlspecialchars($_POST['name']);
 $this->db->query("UPDATE Pokemon SET voteUps=voteUps+1 WHERE Name='$name'".$this->db->escape($id)."'");
?>
