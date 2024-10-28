<?php
$servername = "localhost:3306";
$username = "LinkQ";
$password = "Lifelinkk1223";
$dbname = "linkservice";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>