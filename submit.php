<?php

$pokemon =($_POST["pokemon"]);
$region =($_POST["region"]);
$type =($_POST["type"]);
$yes=($_POST["yesno"]);

$line = "$pokemon $region $type $yes\n";

file_put_contents("survey.txt", $line, FILE_APPEND);

header('Location: results.php');

 ?>
