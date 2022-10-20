<?php
require_once __DIR__.'/connect.php';
$data = mysqli_query($conn, 'SELECT Name, Stock from itemstock order by Stock desc');
echo "<table class='myTable'>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Stock</th>";
echo "</tr>";
while ($data && $row=mysqli_fetch_array($data)) {
    echo "<tr>";
    echo "<td class='rowtd'>" . $row['Name'] . "</td>";
    echo "<td class='rowtd'>" . $row['Stock'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>