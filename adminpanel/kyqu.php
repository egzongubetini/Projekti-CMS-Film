<?php

include 'db.php';


?>

<?php
session_start();




if (isset($_POST['username'])){

 $username = stripslashes($_REQUEST['username']); 

 $username = mysqli_real_escape_string($connection,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($connection,$password); 

        $query = "SELECT * FROM `admin` WHERE username='$username'
and password='".md5($password)."'";
 $result = mysqli_query($connection,$query) or die(mysql_error());
 $test = mysqli_fetch_assoc($result);
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
     $_SESSION['id'] = $test['id'];
      
     header("Location: index.php");
         }else{
             
         $show_errors = '<div class="alert alert-danger">
        Ju sh&euml;nuat t&euml; dh&euml;na t&euml; gabuara, ju lutemi provoni p&euml;rs&euml;ri!
        </div>';
 }
    } 
?>


<link href='stili/style.css' rel='stylesheet' type='text/css'> 

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div> 
                <div class="col-lg-12 login-title">
                    EGZON PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                    
                    <?php if(isset($show_errors)) {
    
   echo $show_errors;
    
} ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input type="password" name="password" class="form-control" i>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <button type="submit"  class="btn btn-outline-primary">KYQU</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>




