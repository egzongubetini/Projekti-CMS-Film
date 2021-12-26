<?php 

$shtofilimin = 'active'; 
include 'include/header.php';
include 'db.php';

?>

<?php
if(isset($_GET['edit'])) {
    
$ida = $_GET['edit'];

$query = "SELECT * FROM filmi WHERE film_id='$ida'";
$test = mysqli_query($connection, $query);



$rows = mysqli_fetch_array($test);
    
         $id = $rows['film_id'];         
      $foto = $rows['film_foto'];
       $title = $rows['film_title'];
       $zhak = $rows['zhan_id'];
 $data_filmit = $rows['film_date'];
 $koha = $rows['film_minute'];
       $rate = $rows['film_rate'];
 $kualiteti = $rows['film_kualiteti'];
        $sllogani = $rows['film_sllogani'];
 $seria = $rows['film_seria'];
  $content = $rows['film_content'];
 $link = $rows['film_link'];
    $shkarkimi =$rows['film_shkarkim'];
$traileri =$rows['film_trailer'];


if($kualiteti == 'HD'){ 

$hd = "checked='checked'";

}elseif($kualiteti == 'FHD') {


$fhd = "checked='checked'";


}elseif($kualiteti == '4K FHD') {


$kfali = "checked='checked'";

} 

    
    
    ?>

 
    
    
<link href='stili/prova.css' rel='stylesheet' type='text/css'> 


</div>
  <form method="POST" action="process.php" enctype="multipart/form-data">
  <input type="hidden" name="film_id" value="<?php echo $id ?>" />
<div class="row">

  <div class="side">
    <h2></h2>
    <h5>Foto e filmit:</h5>
    

    <div class="image-holder" style="height:200px;">
    <div class="avatar-upload">
									<div class="avatar-preview">
										<div id="imagePreview" style="background-image: url(<?php echo $foto ?>);">
										</div>
									</div>
                                    <br>
                                    <label or="imageUpload" class="btn btn-primary">
										    			Change Images<input type="file" name="film_foto" id="imageUpload"  value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
				</label>
								</div>
     </div> 
     <br>
     <br>
     <br> 
<br>

<h2>Konfigurimi i Filmit </h2>
<hr>
<h5>Zgjedh Rezolucionin </h5> 
<div class="fakeimg">
<td class="fieldare"><label for="status0"><input type="radio" name="film_kualiteti" <?php if(isset($hd)) { echo $hd; } ?> id="status0" value="HD">HD&nbsp;&nbsp;&nbsp;</label>

<label for="status1"><input type="radio" name="film_kualiteti" id="status1" <?php if(isset($fhd)) { echo $fhd; } ?>  value="FHD">FHD&nbsp;&nbsp;&nbsp;</label>

<label for="status2"><input type="radio" name="film_kualiteti" id="status2" <?php if(isset($kfali)) { echo $kfali; } ?>  value="4K FHD">4K FHD&nbsp&nbsp;&nbsp;</label></td>     
  </div>
<br>
    <h5>Data e filmit:</h5>
    <div> <input class="fakeimg" placeholder="Data e filmit " type="number" name="film_date" value="<?php echo $data_filmit ?>" style="height:20px;"></input></div><br>
    <h5>Minutazha e filmit:</h5>   
 <div > <input class="fakeimg" placeholder="Minutazha e filmit" type="number" name="film_minute" value="<?php echo $koha ?>" style="height:20px;"></input></div> <br> 
    <h5>Numri serik:</h5>   
 <div > <input class="fakeimg" placeholder="Numri serik i filmit" name="film_seria" value="<?php echo $seria ?>" style="height:20px;"></input></div> <br> 
        
       <h5>Rate IMBD:</h5> <div > <input class="fakeimg" placeholder="Rate" name="film_rate" value="<?php echo $rate ?>" style="height:20px;"></input></div> <br>    
  </div>
  <div class="main">
  <h5> Titulli i filmit </h5>
    <div> <input  class="fakeimg" placeholder="Titulli i filmit" name="film_title" value="<?php echo $title ?>" style="height:8px;"></input>  </div>
<h5>Sllogani i filmit:</h5><div > <input class="fakeimg" placeholder="Sllogani i filmit" name="film_sllogani" value="<?php echo $sllogani ?>" style="height:20px;"></input></div> <br>

          <h5> Zhanri i filmit </h5>
    <div><select class="fakeimg" name="zhan_id" class="select">
                                  <?php 
                                  $prof = "SELECT * FROM zhanre";
                                       $profes = mysqli_query($connection,$prof);

                                   while($rows = mysqli_fetch_array($profes)){
                                       $zhan = $rows['zhan_title'];
                                       $id = $rows['zhan_id'];
                                                                              
                                    ?>   
                                  
                                  
                                 
								  <option value="<?php echo $id ?>" <?php if($id == $zhak){echo 'selected="selected"';}?>  ><?php echo $zhan ?></option>
                                   <?php } ?>
								  </select></div>
    <h2>Pershkrimi i filmit </h2>
    <div><textarea placeholder="Shkruaj Pershkrimin..." class="fakeimg" name="film_content"  style="height:200px ;"><?php echo $content; ?></textarea></div> 
<br>
    <h5> Shto linkun e filmit </h5>
    <div> <input  class="fakeimg" placeholder="Linku i filmit" name="film_link" value="<?php echo $link ?>" style="height:8px;"></input>  </div><br>
   <h5> Shto linkun e trailerit </h5>
    <div> <input  class="fakeimg" placeholder="Linku i traierit" name="film_trailer" value="<?php echo $traileri ?>" style="height:8px;"></input>  </div><br>
   <h5> Shto linkun e shkarkimit </h5>
    <div> <input  class="fakeimg" placeholder="Linku i shkarkimit" name="film_shkarkim" value="<?php echo $shkarkimi ?>" style="height:8px;"></input>  </div><br>


<html>
<head>
<style>
.button {
  border: none;
  color: white;
  padding: 20px 32px;
  text-align: right;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 6px;
  cursor: pointer;
  float: right;
 
}

.button2 {background-color: #4CAF50;} /* Green */
.button3 {background-color: #FF0000;} /* Red */
</style>
</head>
<body>

<button type="submit" name="bini" class="button button2">Ruaj ndryshimet </button> 
<button type="submit" name="xoni1" class="button button3">Anulo</button>

</body>
</html>
    
    <br>
  </div>
   </form>
</div>

<div class="footer">
  <h2>EAP 2021 KOSOVA </h2>
</div>

</body>
</html>

<?php } ?>


    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]); 
        }
    }
    $("#imageUpload").change(function() {
    readURL(this);
    });
    </script>

