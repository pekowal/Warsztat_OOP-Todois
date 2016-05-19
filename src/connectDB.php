<?php

require_once __DIR__."/Task.php";

$host = 'localhost';
$dbUser = 'root';
$dbPassword = 'coderslab';
$dbName = 'todoist';




$conn = new mysqli($host,$dbUser,$dbPassword,$dbName);


if($conn->connect_error != 0) {
    die("Błąd podłączenia bazy {$conn->error}");
}

//echo "Połączenie udane";