<style>
.container{  
text-align: center;  
border: 7px solid red;  
width: 300px;  
height: 200px;  
padding-top: 100px;  
}  

img {
  width: 300px;
}
</style>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

</script>
<div class="container-fluid" id="printableArea">
<center_move>
<?php
session_start();
require_once __DIR__.'/connect.php';
$quantity = $_GET['itemquantity'];
$name = $_GET['itemSelect'];
$area = $_GET['shelfarea'];
$state = 0;

$data = mysqli_query($conn, 'SELECT ID From main order by ID desc');
$row = mysqli_fetch_array($data);
$value = $row[0];

// gets current stock level of items and changes it to allow for the new order
$x = mysqli_query($conn, 'SELECT Stock from itemstock where Name="'.$name.'"');
while ($x && $y = mysqli_fetch_array($x)) {
    $stock = $y['Stock'];
}
$stock = $stock + $quantity;
$conn->query('UPDATE itemstock set Stock="'.$stock.'" where Name="'.$name.'"');

for ($x = 0;$x<$quantity;$x++) {
    $value+=1;
    $sql = $conn->prepare('INSERT INTO main (Name, ShelfArea, State) VALUES (?,?,?)');
    $sql->bind_param('sss', $name, $area, $state);
    $sql->execute();
    $link = 'https://barcode.tec-it.com/barcode.ashx?data='.$value.'&code=Code128&translate-esc=true';

    echo '<div style="text-align: center; font-size: 16px; margin-top:-5px;">
    <!-- insert your custom barcode setting your data in the GET parameter "data" -->
    <h4>'.$name.' <br> '.$value.'</h4>
    <img style="margin-top:-20px; margin-bottom:5px;" alt="Barcode" src="'.$link.'"/>
    </div>';

}    
?>
</div>
<div class="container">  
<?php echo '<button class="btn btn-success btn-lg btn-block" onclick="printDiv('."'".'printableArea'."'".')"><i class="fa fa-print" aria-hidden="true"> Print</i></button> '; ?>
<?php echo '<button class="btn btn-success btn-lg btn-block" onclick="window.close()"><i class="fa fa-print" aria-hidden="true"> Close Window</i></button> '; ?>