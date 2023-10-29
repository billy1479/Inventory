<?php
require_once __DIR__."/connect.php";
$newItem = $_POST['itemName'];
$newStock = 0;
// validation to see if the item already exists
$state = 0;
$data = mysqli_query($conn, 'SELECT Name from items');
while ($data && $row=mysqli_fetch_array($data)) {
    if ($row['Name'] == $newItem) {
        $state = 1;
    } else {
        $state = 0;
    }
}

// this is where the item is added to the system
if ($state == 0) {
    $sql = $conn->prepare('INSERT INTO items (Name) VALUES (?)');
    $sql->bind_param('s',$newItem);
    $sql->execute();
	$sql = $conn->prepare('INSERT INTO itemstock (Name, Stock) VALUES (?,?)');
	$sql->bind_param('ss',$newItem, $newStock);
	$sql->execute();
    echo "<script> alert('This item has been added successfully')</script>";
} else {
    echo "<script> alert('This item already exists - cannot be added')</script>";
}
?>