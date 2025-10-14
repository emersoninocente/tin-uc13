<?php
$host = "localhost";
$user = "biblio_user";
$password = "securepasswordbiblio";
$dbname = "biblioteca_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
?>