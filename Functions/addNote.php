<?php
require_once __DIR__.'/connect.php';
$id = $_POST['barcode'];
$note = $_POST['note'];
if (!($conn->query('UPDATE main set Notes="'.$note.'" where ID="'.$id.'"'))) {
    echo "<script> alert('This ID doesnt exist in the system so cannot be updated.') </script>";
} else {
    echo "<script> alert('This IDs note has been updated.') </script>";
}
?>