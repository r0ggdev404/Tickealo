<?php
$host = "localhost";
$port = "5432";
$dbname = "";
$user = "";
$password = "";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("Error al conectar a la base de datos.");
}
?>

