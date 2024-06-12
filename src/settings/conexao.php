<?php

$servername = "localhost";
$username = "root";
$password = "castro";
$dbname = "afiliadocb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  header("Location: ../index.php");
}

?>