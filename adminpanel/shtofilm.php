<?php 

$shtofilimin = 'active'; 
include 'include/header.php';
include 'db.php';

?>

 
<link href='stili/stili.css' rel='stylesheet' type='text/css'> 
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
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
										<div id="imagePreview" style="background-image: url(<?php if(isset($foto)) { echo $foto; } else {  echo 'https://st.depositphotos.com/1987177/3470/v/600/depositphotos_34700099-stock-illustration-no-photo-available-or-missing.jpg';  } ?>);">
										</div>
									</div>
								<br>
                                    <label or="imageUpload" class="btn btn-primary">
										    			Upload Image<input type="file" name="film_foto" id="imageUpload"  value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;">
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
<td class="fieldare"><label for="status0"><input type="radio" name="film_kualiteti" id="status0" value="HD">HD&nbsp;&nbsp;&nbsp;</label>

<label for="status1"><input type="radio" name="film_kualiteti" id="status1" checked="checked" value="FHD">FHD&nbsp;&nbsp;&nbsp;</label>

<label for="status2"><input type="radio" name="film_kualiteti" id="status2"  value="4K FHD">4K FHD&nbsp&nbsp;&nbsp;</label></td>     
  </div>

    <h5>Data e filmit:</h5>
    <div> <input class="fakeimg" placeholder="Data e filmit " type="number" name="film_date" style="height:20px;"></input></div><br>
     <h5>Minutazha e filmit:</h5>
    <div > <input class="fakeimg" placeholder="Minutazha e filmit" type="number" name="film_minute" style="height:20px;" required></input></div> <br> 
     <h5>Numri serik i filmit: </h5>
    <div > <input class="fakeimg" placeholder="Numri serik i filmit" name="film_seria" style="height:20px;"></input></div> <br> 
 
     <h5>Rate e filmit IMBD :</h5>
    <div > <input class="fakeimg" placeholder="Rate" name="film_rate" style="height:20px;"></input></div> <br> 
</div>
  <div class="main">
  <h5> Titulli i filmit </h5>
    <div> <input  class="fakeimg" placeholder="Titulli i filmit" name="film_title" style="height:8px;" required></input>  </div>
    <h5>Sllogani i filmit :</h5>
    <div > <input class="fakeimg" placeholder="Sllogani i filmit" name="film_sllogani" style="height:20px;"></input></div> <br>
      <h5> Zhanri i filmit </h5>
    <div><select class="fakeimg" name="zhan_id" class="select">
                                  <?php 
                                  $prof = "SELECT * FROM zhanre";
                                       $profes = mysqli_query($connection,$prof);

                                   while($rows = mysqli_fetch_array($profes)){
                                       $zhan = $rows['zhan_id'];
                                       $zhan_title = $rows['zhan_title'];
                                                                              
                                    ?>   
                                  
                                  
                                 
								  <option value="<?php echo $zhan ?>"><?php echo $zhan_title ?></option>
                                   <?php } ?>
								  </select></div>
    <h2>Pershkrimi i filmit </h2>
    <div><textarea placeholder="Shkruaj Pershkrimin..." class="fakeimg" name="film_content" style="height:200px ;"></textarea></div> 
<br>
    <h5> Shto linkun e filmit </h5>
    <div> <input  class="fakeimg" placeholder="Linku i filmit" name="film_link" style="height:8px;" required></input>  </div>
    <br>
 <h5> Shto linkun e Trailerit </h5>
    <div> <input  class="fakeimg" placeholder="Linku i trailerit" name="film_trailer" style="height:8px;"></input>  </div>
    <br>
 <h5> Shto linkun e shkarkimit </h5>
    <div> <input  class="fakeimg" placeholder="Linku i shkarkimit" name="film_shkarkim" style="height:8px;"></input>  </div>
    <br>

        
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

<button type="submit" name="xoni" class="button button2">Shto Filmin </button> 
<button type="submit" name="xoni1" class="button button3">Fshij Filmin </button>

</body>
</html>
    
    <br>
  </div>
   </form>
</div>

<div class="footer">
  <h2>EAP 2021 KOSOVA </h2>
  <h4>@Te gjitha te drejtat te rezervuara</h4>
</div>

</body>
</html>
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