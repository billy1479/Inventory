<?php
require_once __DIR__.'/connect.php';
$name = $_POST['name'];
$note = $_POST['note'];
if (!($conn->query('UPDATE jobs set Notes="'.$note.'" where Name="'.$name.'"'))) {
    echo "<script> alert('This ID doesnt exist in the system so cannot be updated.') </script>";
} else {
    echo "<script> alert('This Job note has been updated.') </script>";
}
?>