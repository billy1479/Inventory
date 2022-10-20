<?php
// for changing the item area
require_once __DIR__."/connect.php";
$id = $_POST['ID'];
$area = $_POST['shelfArea'];
$state = 0;

$data = mysqli_query($conn, 'SELECT ID from main');

if (!($conn->query('UPDATE main set ShelfArea="'.$area.'" WHERE ID="'.$id.'"'))) {
    echo "<script> alert('This ID doesnt exist in the system so cannot be updates.') </script>";
} else {
    echo "<script> alert('This IDs area has been changed.') </script>";
}
?>