<?php
include 'db.php';
session_start();


if(isset($_POST['ruaje'])) {


    $idasg = $_POST['id'];

$query = "SELECT * FROM admin WHERE id='$idasg'";
$info = mysqli_query($connection,$query);
$rows = mysqli_fetch_array($info);


$ida = $rows['id'];
    
    
    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $username = $_POST['username'];
    $email = $_POST['email'];





   

    
    
    
    $len = strlen($emri);
    if ($len <= "0")
    {
        $_SESSION['mezashi'] .= "Emri [ Emri nuk eshte shkruar ]";
    }
    $len = strlen($mbiemri);
    if ($len <= "0")
    {
        $_SESSION['mezashi'] .= "Mbiemri [ Mbiemri nuk eshte shkruar ]";
    }
    $len = strlen( $email );
    if ( $len <= "0" )
    {
        $_SESSION['mezashi'] .= "Email [ Nuk eshte shkruar ]";
    }
    else if ($len <= "3")
    {
        $_SESSION['mezashi'] .= "Email [ Nuk eshte i gjat mjaftueshum ]";
    }
    $len = strlen( $username );
    if ($len <= "0")
    {
        $_SESSION['mezashi'] .= "Username [ <b>Not Entered</b> ]";
    } else if (mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `admin` WHERE `username` = '".$username."' && `id` != '".$ida."'")) != 0 )
    {

        $_SESSION['mezashi'] .= "Username  [ Eshte ne perdorim provoni nje tjter ]";
    }

    if ( isset( $_SESSION['mezashi'] ) )
    {
        $_SESSION['mezashi'] = $_SESSION['mezashi'];
        $_SESSION['code'] = "error";
        header("Location: profili.php");
        exit( );
    }


    

    
    
      $querys = "UPDATE `admin` SET `username` = '".$username."', `emri` = '".$emri."', `mbiemri` = '".$mbiemri."', `email` = '".$email."' WHERE `id` = '".$ida."'";
      $yess = mysqli_query($connection,$querys);

    $_SESSION['mezashi'] = "Admini eshte bere update me sukses!";
    $_SESSION['code'] = "success";
    header("Location: profili.php");
    exit( );


    
}

if(isset($_POST['passwordi'])) {


    $idasg = $_POST['id'];

$query = "SELECT * FROM admin WHERE id='$idasg'";
$info = mysqli_query($connection,$query);
$rows = mysqli_fetch_array($info);


$ida = $rows['id'];
    
    
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
        if ( $password !== $password2 )
    {
        $_SESSION['mezashi'] .= "Passwords  [ Passwordi nuk perputhet ]";
    }
     else if (empty( $password ))
    {
          $_SESSION['mezashi'] .= "Passwords  [ Passwordi nuk eshte shkruar ]"; 
    }
    
    

         if ( isset( $_SESSION['mezashi'] ) )
    {
        $_SESSION['mezashi'] = $_SESSION['mezashi'];
        $_SESSION['code'] = "error";
        header("Location: profili.php");
        exit( );
    }
    



      $queri = "UPDATE `admin` SET `password` = md5('".$password."') WHERE `id` = '".$ida."'";
      $po = mysqli_query($connection, $queri);
   

    $_SESSION['mezashi'] = "Passwordi eshte nderruar me sukses";
    $_SESSION['code'] = "success";
    header("Location: profili.php");
    exit( );


    
}

if(isset($_POST['shtoadmin'])) {


$emri = $_POST['emri'];
$mbiemri = $_POST['mbiemri'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = md5($_POST['password']);


 if (mysqli_fetch_array(mysqli_query($connection, "SELECT id FROM `admin` WHERE `username` = '".$username."'" )) != 0 ) 
 { 

 $_SESSION['mezashi'] = "Username  [ Eshte ne perdorim provoni nje tjter ]"; 
 $_SESSION['code'] = "error";
 header('Location: administrimi.php');
  exit( );
  
 }


if(empty($emri) || empty($mbiemri) || empty($email) || empty($username) || empty($password)) {

 $_SESSION['mezashi'] = "Kolonat duhet te plotesohet te gjithat"; 
 $_SESSION['code'] = "error";
 header('Location: administrimi.php');
  exit( );


} 


$query = "INSERT INTO admin(emri,mbiemri,email,username,password) VALUES ('$emri','$mbiemri','$email','$username','$password') ";


$result = mysqli_query($connection, $query);

if (!$result) {
	
	die('Failed' . mysqli_error());
	
}else{
	
    
    $_SESSION['mezashi'] = "Admini eshte shtuar me sukses";
    $_SESSION['code'] = "success";
	header('Location: administrimi.php');
exit;
	
}



    
}


if(isset($_GET['deleteadmin'])) {

$boom = $_GET['deleteadmin'];


$kueri = mysqli_query($connection, "DELETE FROM admin WHERE id='$boom'");



if(!$kueri) {  
    
    die("DELETE GABIM" . mysqli_die($connection));
}


    $_SESSION['mezashi'] = "Admini eshte fshir me sukses";
    $_SESSION['code'] = "success";
    header("Location: administrimi.php");  
    exit();
    
    
}

if(isset($_POST['ruajadmin'])) {
    
    
    
       $ido = $_POST['id'];

$query = "SELECT * FROM admin WHERE id='$ido'";
$ongo = mysqli_query($connection,$query);
$rows = mysqli_fetch_array($ongo);

$id = $rows['id'];





    $emri = $_POST['emri'];
    $mbiemri = $_POST['mbiemri'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
     if (mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `admin` WHERE `username` = '".$username."' && `id` != '".$id."'")) != 0 )
    {

        $_SESSION['mezashi'] .= "Username  [ Eshte ne perdorim provoni nje tjter ]";
            $_SESSION['code'] = "error";
            header("Location: administrimi.php");
            exit( );
    }
    
       if (empty($password))
    {
      $querys = "UPDATE `admin` SET `username` = '".$username."', `emri` = '".$emri."', `mbiemri` = '".$mbiemri."', `email` = '".$email."' WHERE `id` = '".$id."'";
      $yess = mysqli_query($connection,$querys);
    } else
        
    {
      $queri = "UPDATE `admin` SET `username` = '".$username."', `emri` = '".$emri."', `mbiemri` = '".$mbiemri."', `email` = '".$email."', `password` = md5('".$password."') WHERE `id` = '".$id."'";
      $po = mysqli_query($connection, $queri);
    }
    
   

    $_SESSION['mezashi'] = "Admini eshte bere update me sukses!";
    $_SESSION['code'] = "success";
    header("Location: administrimi.php");
    exit( );
    
    
}


    






?>