<?php
require_once __DIR__.'/connect.php';
$data = mysqli_query($conn, 'SELECT * from jobs');
echo "<table class='myTable'>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Notes</th>";
echo "<th>Date</th>";
echo "</tr>";
while ($data && $row=mysqli_fetch_array($data)) {
	if ($row['Name'] == 'N/A') {
		
	} else {
    echo "<tr>";
    echo "<td class='rowtd'>" . $row['Name'] . "</td>";
    echo "<td class='rowtd'>" . $row['Notes'] . "</td>";
    echo "<td class='rowtd'>" . $row['Date'] . "</td>";
    echo "</tr>";
}}
echo "</table>";
?>