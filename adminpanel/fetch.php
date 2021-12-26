

<?php 
 
 include 'db.php';
 
 
 $ida = $_POST['id'];

 $roos = mysqli_query($connection, "SELECT * FROM filmi WHERE film_id='$ida'");
 
 $nri = mysqli_num_rows($roos); 
 
 if($nri == 0){
     header("Location: index.php"); 
 }


 $test = mysqli_query($connection, "SELECT * FROM filmi WHERE film_id='$ida'"); 

    $rowfs = mysqli_fetch_array($test); 
     
     $statusi = $rowfs['statusi'];
     $id = $rowfs['film_id'];
     $trend = $rowfs['trend'];
      if($statusi == 'show'){
     
     $statu = 'checked'; 
     
     
 }
       if($trend == 'on'){
     
     $tren = 'checked'; 
     
     
 }
     
  ?>   
  								
  <p>Konfigurimi i filmit </p>
  
  <input type="hidden" name="film_id" value="<?php echo $id ?>" />
  <div class="custom-checkbox">
  <input class="form-check-input" name="statusi" type="hidden" value="mshifu" />                         
  <input class="form-check-input" name="statusi" type="checkbox" <?php if(isset($statu)) {echo $statu;}  ?> .' value="show" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    Shfaq Filmin 
  </label>
</div>
 <div class="custom-checkbox">
  <input class="form-check-input" name="trend" type="hidden" value="mshifu" />                         
  <input class="form-check-input" name="trend" type="checkbox" <?php if(isset($tren)) {echo $tren;}  ?> .' value="on" id="flexChecktrend">
  <label class="form-check-label" for="flexChecktrend">
    Shto ne trend 
  </label>
</div>






     
 
 
 