<?php 

include 'db.php';


$ida = $_POST['id'];


 $test = mysqli_query($connection, "SELECT * FROM admin WHERE id='$ida'"); 

    $rows = mysqli_fetch_array($test); 
    
      $id = $rows['id'];         
      $emri = $rows['emri'];
      $mbiemri = $rows['mbiemri'];
      $username = $rows['username'];
      $email = $rows['email'];
    

?>



<input type="hidden" name="id" value="<?php echo $id ?>" />
<label for="formGroupExampleemri">Emri</label>
                <input type="text" name="emri" value="<?php echo $emri ?>" class="form-control" id="formGroupExampleInput" placeholder="Emri">
                 </div>
                 <div class="form-group">
                  <label for="formGroupExamplembiemri">Mbiemri</label>
                 <input type="text" name="mbiemri" value="<?php echo $mbiemri ?>" class="form-control" id="formGroupExampleInput2" placeholder="Mbiemri">
                  </div>
                   <div class="form-group">
                  <label for="formGroupExamplembiemri">Email</label>
                 <input type="text" name="email" value="<?php echo $email ?>" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                  </div>
                  <div class="form-group">
                  <label for="formGroupExamplembiemri">Username</label>
                 <input type="text" name="username" value="<?php echo $username ?>" class="form-control" id="formGroupExampleInput2" placeholder="Email">
                  </div>
                   <div class="form-group">
                  <label for="formGroupExamplembiemri">Password</label>
                 <input type="text" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password">
                 </br>
                 <p> Leni zbrazur per mos nderruar pwn.</p>
                 </div>
