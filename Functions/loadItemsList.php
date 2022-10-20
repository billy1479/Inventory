<?php
// all done and working fine
require_once __DIR__.'/connect.php';
if ($_POST['mode']=='1') {
    echo "<option value=''>Please select an item...</option>";
} else {};
$data = mysqli_query($conn, 'SELECT Name from items order by Name');
while ($data && $row=mysqli_fetch_array($data)) {
    echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
}
?>