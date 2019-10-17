<?php
$connection = new mysqli('localhost', 'root', '', 'dogdb');

if ($connection->connect_error) { // Check connection
 die("Connection failed: " . $connection->connect_error);
} 


?>