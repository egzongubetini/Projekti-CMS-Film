<?php
$profili = 'active';
include 'db.php';
include 'include/header.php';


$query = "SELECT * FROM admin WHERE id='".$_SESSION['id']."' LIMIT 1";
$info = mysqli_query($connection,$query);
$rows = mysqli_fetch_array($info);

if (empty($_SESSION['emri'])) {
    $_SESSION['emri'] = $rows['emri'];
  }
       if (empty($_SESSION['mbiemri'])) {
       $_SESSION['mbiemri'] = $rows['mbiemri'];
      }
if (empty($_SESSION['username'])) {
    $_SESSION['username'] = $rows['username'];
}
if (empty($_SESSION['email'])) {
    $_SESSION['email'] = $rows['email'];
}
      if (empty($_SESSION['password'])) {
        $_SESSION['password'] = $rows['password'];
    }


?>

<!-- CSS only -->
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  


      <?php 
      if(isset($_SESSION['mezashi']) && isset($_SESSION['code']) !="")
{ 
?>
<script>

swal({
  title: " <?php echo $_SESSION ['mezashi']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['code']; ?>",
  button: "Done", 
})

</script>
<?php
unset($_SESSION['mezashi']); 

} 


?>






<div class="container">

    <h1>Edito Profilin</h1>
  	<hr>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Llogaria juaj <i class="fas fa-angle-down"></i></div>
                                    <div class="card-body card-block">
                                    <form method="post" action="procesi.php">
                                    <input type="hidden" name="id" value="<?php echo $rows['id']; ?>" />                                          
                                          <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="First Name" name="emri" value="<?php echo $rows['emri'];?>" class="form-control">
                                                </div>
                                            </div>
                                          <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="Last Name" name="mbiemri" value="<?php echo $rows['mbiemri'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="email" id="email" name="email" value="<?php echo $rows['email'];?>" placeholder="<?php echo $rows['email'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="username" id="username" name="username" placeholder="Username" value="<?php echo $rows['username'];?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" name="ruaje" class="btn btn-success btn-sm">Ruaj</button>
                                            </div>
                                            </form>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Ndrysho</strong> Passwordin
                                    </div>
                                    <div class="card-body card-block">
                                      <form action="procesi.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $rows['id']; ?>" />
                                            <div class="form-group">
                                                <label for="oldpin" class=" form-control-label"></label>
                                                <input type="password" id="newpin" name="password" placeholder="Passwordi i Ri" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="newpin" class=" form-control-label"></label>
                                                <input type="password" id="newtry" name="password2" placeholder="Rishkruaj Passwordin" class="form-control">
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" name="passwordi" class="btn btn-success btn-sm">Ruaj</button>
                                            </div>
                                        </form>
                                    </div>
                                  </div>

                                    </div>
                                </div>
                            </div>
</div>
</div>
<hr>