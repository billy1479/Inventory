<?php
// all working
require_once __DIR__.'/connect.php';
$data = mysqli_query($conn, 'SELECT Name from jobs');
echo "<option value=''>Please select a job...</option>";
while ($data && $row=mysqli_fetch_array($data)) {
	if ($row['Name'] == 'N/A') {
		
	} else {
    echo "<option value='".$row['Name']."'>".$row['Name']."</option>";
	}
}
?>