<?php
// Details will need to be updated for the SQL server in use
$username = '';
$password = '';
$servername = '';
$dbname = '';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed");
}
?>