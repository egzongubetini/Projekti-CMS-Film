 <?php
 
 include 'db.php';
 session_start();
 
 
 
            if(isset($_POST['rujte'])) {
                
             $getid = $_POST['film_id'];
             $statusi = $_POST['statusi'];
             $trend = $_POST['trend'];
             

             $roota = "UPDATE filmi SET statusi='$statusi', trend='$trend' WHERE film_id='$getid'";
             $res = mysqli_query($connection, $roota);
             
             if(!$res){
                 
                 die("mysqli error" . mysqli_error($connection));
                 
             }
                          
                
              $_SESSION['mezashi'] = 'Success fully saved';
              $_SESSION['code'] = 'success';
              header("Location: index.php");
              
                
            }
            
            ?>