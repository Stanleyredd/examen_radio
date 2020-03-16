<?php
/**
 * Created by PhpStorm.
 * User: stanley
 * Date: 2-8-2019
 * Time: 17:13
 */

$servername = "localhost";
$username = "root";
$password = "";
$db = "mydb";

//connectie maken
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }


?>
