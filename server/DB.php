<?php
$conn = new mysqli("localhost","root","","glambydebbie");

// Check connection
if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>