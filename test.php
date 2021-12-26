<?php 
include 'db.php';



$querys = "SELECT DISTINCT film_date FROM filmi";
$test = mysqli_query($connection, $querys);

while($row = mysqli_fetch_array($test)){

$bas = $row['film_date'];

echo $bas;

}


?>