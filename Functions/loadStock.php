<?php
require_once __DIR__.'/connect.php';
if ($_POST['mode'] == '1') {
    $name = $_POST['itemName'];
    $data = mysqli_query($conn, 'SELECT Stock from itemstock where Name="'.$name.'"');
    while ($data && $row=mysqli_fetch_array($data)) {
        $stock = $row['Stock'];
    }
    $stock = json_encode(array('stock' => $stock));  
    echo "<script>stockLevel = ".$stock."</script>";
} else {
    $x = mysqli_query($conn, 'SELECT Name from main where ID="'.$_POST['itemName'].'"');
    while ($x && $y=mysqli_fetch_array($x)) {
        $name = $y['Name'];
    }
    $data = mysqli_query($conn, 'SELECT Stock from itemstock where Name="'.$name.'"');
    while ($data && $row=mysqli_fetch_array($data)) {
        $stock = $row['Stock'];
    }
    $stock = json_encode(array('stock' => $stock));  
    echo "<script>stockLevel = ".$stock."</script>";
}
$conn->close();
?>