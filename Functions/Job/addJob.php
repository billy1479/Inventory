<?php
require_once __DIR__.'/connect.php';
$name = $_POST['name'];
$note = $_POST['note'];
$date = $_POST['date'];
$state = 0;
$x = mysqli_query($conn, 'SELECT Name from jobs');
while ($x && $y = mysqli_fetch_array($x)) {
    if ($y['Name']==$name) {
        $state = 1;
    } else {}
}
if ($state == 0) {
    $conn->query('INSERT INTO jobs (Name, Notes, Date) VALUES ("'.$name.'","'.$note.'","'.$date.'")');
    echo "<script> alert('This job has had the note added.') </script>";
} else {
    echo "<script> alert('This job doesnt exist in the system so cannot be updated.') </script>";
}
?>