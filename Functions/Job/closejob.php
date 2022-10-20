<?php
require_once __DIR__.'/connect.php';
$name = $_POST['name'];
$x = mysqli_query($conn, 'SELECT ID, Name from jobs');
while ($x && $y = mysqli_fetch_array($x)) {
    if ($y['Name']==$name) {
        $jobID = $y['ID'];
    } else {}
}
$conn->query('DELETE from main where Job="'.$jobID.'"');

$conn->query('DELETE from jobs WHERE Name="'.$name.'"');


if (!($conn->query('DELETE from main where Job="'.$jobID.'"'))) {
    echo "<script> alert('This ID doesnt exist in the system so cannot be updated.') </script>";
} else {
    if (!($conn->query('DELETE from jobs WHERE Name="'.$name.'"'))) {
        echo "<script> alert('This ID doesnt exist in the system so cannot be updated.') </script>";
    } else {
        echo "<script> alert('This Job note has been updated.') </script>";
    }
}
?>