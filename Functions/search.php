<?php
require_once __DIR__.'/connect.php';
$data = mysqli_query($conn, "SELECT * FROM main WHERE ID='".$_POST['itemName']."'");
$counter = 0;
while ($data && $row=mysqli_fetch_array($data)) {
    $counter = $counter + 1;
    $jsonObject = json_encode(array("Name" => $row['Name'], "ShelfArea" => $row['ShelfArea'], "State" => $row['State'], "Note" => $row['Notes']));
}
if ($counter == 0) {
    echo "<script>myObject = '';</script>"; 
} else {
    echo "<script>myObject = ".$jsonObject.";</script>";
}
?>
