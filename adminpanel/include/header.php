<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: kyqu.php");
exit(); }
?>

<html lang="en">
<head>
<title>Egzon Admin Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='stili/stili.css' rel='stylesheet' type='text/css'> 

 </head>
 


<div class="header">
  <h1>Egzon Admin Panel</h1>
  <p>E<b>A</b>P</p>
  
 
        </div>
      




<div class="kungfu">
<a href="administrimi.php" class="<?php if (isset($admini)) {echo $admini; } else { echo 'joaktiv';} ?>"> ADMINISTRIMI </a>
 <a href="shtofilm.php" class="<?php if(isset($shtofilimin)) { echo $shtofilimin; } else { echo 'joaktiv'; }?>">SHTO FILM TE RI + </a>
  <a href="index.php" class="<?php if(isset($indeks)) { echo $indeks; } else { echo 'joaktiv'; } ?>">  LISTA E FILMAVE </a>
<a href="zhanret.php" class="<?php if (isset($zhanri)) {echo $zhanri; } else { echo 'joaktiv';} ?>"> ZHANRET </a>

      <div style="float: right">
 
      <a href="logout.php"><i class="fas fa-lock"></i> Qkyqu</a>
<a href="profili.php" class="<?php if(isset($profili)) { echo $profili; } else { echo 'joaktiv'; } ?>"> PROFILI IM</a>

  </div>
</div>	
   </link>

