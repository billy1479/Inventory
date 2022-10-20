<?php
require_once __DIR__.'/connect.php';
echo $_POST['newStock'];
echo $_POST['itemName'];
$data = mysqli_query($conn, 'UPDATE itemstock set Stock="'.$_POST['newStock'].'" WHERE Name="'.$_POST['itemName'].'"')
?>