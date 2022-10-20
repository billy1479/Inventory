<?php
require_once __DIR__.'/connect.php';
$id = $_POST['ID'];
$data = mysqli_query($conn, 'SELECT State from main where ID="'.$id.'"');
while ($data && $row = mysqli_fetch_array($data)) {
    $state = $row['State'];
}
if ($state == 0) {
    $data = mysqli_query($conn, 'SELECT Name from main where ID="'.$_POST['ID'].'"');
    while ($data && $row=mysqli_fetch_array($data)) {
        $name = $row['Name'];
    }
    $x = mysqli_query($conn, 'SELECT Stock from itemstock where Name="'.$name.'"');
    while ($x && $y = mysqli_fetch_array($x)) {
        $stock = $y['Stock'];
    }
    $stock = $stock - 1;
    $conn->query('UPDATE itemstock set Stock="'.$stock.'" where Name="'.$name.'"');
    $conn->query('DELETE FROM main where ID="'.$id.'"');
} else {
    $conn->query('DELETE FROM main where ID="'.$id.'"');
}
?>