<?php
require_once __DIR__.'/connect.php';
$data = mysqli_query($conn, 'SELECT Name, ShelfArea, Job FROM main where state="1"');
echo "<table class='myTable'>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Area</th>";
echo "<th>Assigned Job</th>";
echo "</tr>";
while ($data && $row=mysqli_fetch_array($data)) {
    $job = mysqli_query($conn, 'SELECT Name from jobs where ID="'.$row['Job'].'"');
    while ($job && $currentJob = mysqli_fetch_array($job)) {
		$x = $currentJob['Name'];
    }
    echo "<tr>";
    echo "<td class='rowtd'>" . $row['Name'] . "</td>";
    echo "<td class='rowtd'>" . $row['ShelfArea'] . "</td>";
    echo "<td class='rowtd'>" .$x. "</td>";
    echo "</tr>";
}
echo "</table>";
?>