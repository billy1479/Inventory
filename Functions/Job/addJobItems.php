<?php
require_once __DIR__.'/connect.php';
$item = $_POST['name'];
$x = mysqli_query($conn, 'SELECT ID, Name from jobs');
while ($x && $y = mysqli_fetch_array($x)) {
    if ($y['Name']==$item) {
        $jobID = $y['ID'];
    } else {}
}

$id = $_POST['barcode'];
$conn->query('UPDATE main set Job="'.$jobID.'" where ID="'.$id.'"');
if (!($conn->query('UPDATE main set Job="'.$jobID.'" where ID="'.$id.'"'))) {
    echo "<script> alert('This item doesnt exist in the system so cannot be updated.') </script>";
} else {
    echo "<script> alert('This item has been added to the job.') </script>";
}
?>