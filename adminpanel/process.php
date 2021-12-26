<?php
include 'db.php';
session_start();


if(isset($_POST['xoni'])){ 


 $title = $_POST['film_title'];
 $zhanri = $_POST['film_zhanri'];
 $content = $_POST['film_content'];
 $link = $_POST['film_link'];
 $data_filmit = $_POST['film_date'];
 $koha = $_POST['film_minute'];
$kualiteti = $_POST['film_kualiteti'];
 $sllogani = $_POST['film_sllogani'];
 $seria = $_POST['film_seria'];
 $rate = $_POST['film_rate'];
 $zhanri = $_POST['zhan_id'];
 $traileri = $_POST ['film_trailer'];
 $shkarkimi = $_POST ['film_shkarkim'];



 
 

     $imgFile = $_FILES['film_foto']['name'];
    $tmp_dir = $_FILES['film_foto']['tmp_name'];
    $imgSize = $_FILES['film_foto']['size'];
    
    $upload_dir = '../images/';
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');;
      $UserAvatar = rand(1000,1000000).".".$imgExt;
      $avatar = $upload_dir.$UserAvatar;
    
        
         if (move_uploaded_file($tmp_dir,$avatar))  {
            $msg = "Image uploaded successfully";
        }else{
            echo "Failed to upload image"; 
      }
$query = "INSERT INTO filmi (film_foto,film_title,zhan_id,film_content,film_link,film_trailer,film_shkarkim,film_date,film_minute,film_sllogani,film_seria,film_rate,film_kualiteti,statusi,trend) VALUES ('$avatar','$title','$zhanri','$content','$link','$traileri','$shkarkimi','$data_filmit','$koha','$sllogani','$seria','$rate','$kualiteti','show','pldh') ";
$sql = "INSERT INTO filmi SET film_foto='$avatar', film_title='$title', film_zhanri='$zhanri', film_content='$content', film_link='$link', film_date='$data_filmit', film_minute='$koha', film_sllogan='$sllogani', film_seria='$seria'";
$opa = mysqli_query($connection, $query);
header("Location: index.php");


if(!$opa) {
    
    die("Diqka error" . mysqli_die($connection));
    
}

    $_SESSION['mezashi'] = "Filmi eshte shtuar me sukses!";
    $_SESSION['code'] = "success";
    header("Location: index.php");
    exit( );

    
}

if(isset($_POST['bini'])) {
    
     $id = $_POST['film_id'];
    
    
    
    $imgFile = $_FILES['film_foto']['name'];
    $tmp_dir = $_FILES['film_foto']['tmp_name'];
    $imgSize = $_FILES['film_foto']['size'];

      $upload_dir = '../images/';
      $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
      $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'webp');;
      $UserAvatar = rand(1000,1000000).".".$imgExt;
      $avatar = $upload_dir.$UserAvatar;

    if($imgSize<(2000)) { 
         	$msg = '<div id="msgbox" class="msgred">Fajlli juaj &euml;sht&euml; shum&euml; i madh,<br> duhet t&euml; jet&euml; m&euml; pak se <b>2MB</b>.</div>';

    }
    else {
     move_uploaded_file($tmp_dir,$avatar);
     $ostest = "UPDATE filmi SET film_foto='$avatar' WHERE film_id='$id'";
     $joa = mysqli_query($connection, $ostest);
	$msg = '<div id="msgbox" class="msggreen">Fotoja e profilit &euml;sht&euml; ndryshuar<br> me sukses!</div>';
}


   

    
    
   
     $title = $_POST['film_title'];
 $content = $_POST['film_content'];
 $link = $_POST['film_link'];
 $data_filmit = $_POST['film_date'];
 $koha = $_POST['film_minute'];
 $sllogani = $_POST['film_sllogani'];
 $seria = $_POST['film_seria'];
 $rate = $_POST['film_rate'];
 $zhanri = $_POST['zhan_id'];
 $traileri = $_POST['film_trailer'];
 $shkarkimi = $_POST['film_shkarkim'];
$kualiteti = $_POST['film_kualiteti'];

 
 

$sqls = "UPDATE filmi SET film_title='$title', zhan_id='$zhanri', film_content='$content', film_link='$link', film_date='$data_filmit', film_minute='$koha', film_sllogani='$sllogani', film_seria='$seria',film_rate='$rate', film_kualiteti='$kualiteti', film_trailer='$traileri',film_shkarkim='$shkarkimi' WHERE film_id='$id'";
$sss = mysqli_query($connection, $sqls);



header("Location: index.php");
 
  
  if(!$sss) {
    
    die("Diqka error" . mysqli_die($connection));
    
}  
    
        $_SESSION['mezashi'] = "Filmi eshte edituar me sukses!";
    $_SESSION['code'] = "success";
    header("Location: index.php");
    exit( );

    
    
    
    
}

if(isset($_GET['fshirja'])) {  

$boom = $_GET['fshirja'];


$kueri = mysqli_query($connection, "DELETE FROM filmi WHERE film_id='$boom'");



if(!$kueri) {  
    
    die("DELETE GABIM" . mysqli_die($connection));
}


    $_SESSION['mezashi'] = "Filmi u fshie me sukses";
    $_SESSION['code'] = "success";
    header("Location: index.php");  
    exit();
    
    
}





?> 