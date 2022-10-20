<?php
// complete
require_once __DIR__.'/connect.php';
$data = mysqli_query($conn, 'SELECT Name from main where ID="'.$_POST['barcode'].'"');
while ($data && $row=mysqli_fetch_array($data)) {
    $name = $row['Name'];
}
$x = mysqli_query($conn, 'SELECT Stock from itemstock where Name="'.$name.'"');
while ($x && $y = mysqli_fetch_array($x)) {
    $stock = $y['Stock'];
}
$stock = $stock - 1;
$conn->query('UPDATE itemstock set Stock="'.$stock.'" where Name="'.$name.'"');

$conn->query('UPDATE main set State="1" where ID="'.$_POST['barcode'].'"');
echo "Item number ".$_POST['barcode']." has been marked as reserved";
$conn->close();
?>