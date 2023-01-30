<?php
// connection to sql 
$servername = 'localhost'; // ip
$database = 'estoque'; // your db
$username = 'root'; // your username 
$password = ''; // your password

$connect = mysqli_connect($servername, $username, $password, $database);
$mysqli = new mysqli($servername,$username,$password, $database);
?>