<?php
// working perfectly
require_once __DIR__.'/connect.php';
$quantity = $_POST['quantity'];
$name = $_POST['itemName'];
$area = $_POST['area'];
$state = 0;
// needs testing and checking before executing (may make wrong entries) - sort printing first
$data = mysqli_query($conn, 'SELECT ID From main order by ID desc');
$row = mysqli_fetch_array($data);
$value = $row[0];

// gets current stock level of items and changes it to allow for the new order
$x = mysqli_query($conn, 'SELECT Stock from itemstock where Name="'.$name.'"');
while ($x && $y = mysqli_fetch_array($x)) {
    $stock = $y['Stock'];
}
$stock = $stock + $quantity;
$conn->query('UPDATE itemstock set Stock="'.$stock.'" where Name="'.$name.'"');




for ($x = 0;$x<$quantity;$x++) {
    $value+=1;
    $sql = $conn->prepare('INSERT INTO main (Name, ShelfArea, State) VALUES (?,?,?)');
    $sql->bind_param('sss', $name, $area, $state);
    $sql->execute();    
    echo "<img id='barcode' class='barcodeImages' alt='Barcode Generator TEC-IT' src='https://barcode.tec-it.com/barcode.ashx?data=".$value."&code=Code128&translate-esc=true'/>";
}
?>