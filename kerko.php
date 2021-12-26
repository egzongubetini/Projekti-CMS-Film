<?php

include 'db.php';
include 'include/header.php';
include 'include/category.php';


if (isset($_POST['query'])) {
		$search = mysqli_real_escape_string($connection, $_POST['query']);
		$sql = "SELECT * FROM filmi WHERE statusi='show' AND film_title LIKE '%$search%'";
	}else{
		$sql = "SELECT * FROM filmi WHERE statusi='show' ORDER BY film_id DESC";
	}
    
    
    ?>
     <section id="content" class="inner-container">
  
        
         <div class="item-container">
    
    <?php
	$query = mysqli_query($connection, $sql);
	if (mysqli_num_rows($query) > 0) {

        while($rows = mysqli_fetch_assoc($query)) {
              
             $idfilm = $rows['film_id'];
              $film_foto = $rows['film_foto'];
              $film_content = $rows['film_content'];
              $film_link = $rows['film_link'];
               $rate = $rows['film_rate'];
               $date = $rows['film_date'];
               $film_title = $rows['film_title'];
               $trend = $rows['trend'];
            
        
        
        
        
        
        ?>
        
        
        
        
        
        
        
       
        
        
          <div class="item">
            <a href="/film/id/<?php echo $idfilm ?>">
              <div class="item-flip">
                <div class="item-inner">
                                <?php if($trend == 'on') {
               echo '<span class="item-quality BLU-RAY">TREND</span>';
                } ?>
                  <img src="images/<?php echo $film_foto ?>" alt="Archive">
                </div>
                <div class="item-details">
                  <div class="item-details-inner">
                    <h2 class="movie-title"><?php echo $film_title ?></h2>
                    <p class="movie-description"><?php echo $film_content ?></p>
                    <div class="watch-btn">
                      <div class="imdb-rating" data-content="<?php echo $rate ?>">
                        <i class="fa fa-star"><?php echo $rate ?></i></div>
                      <span class="movie-date"><?php echo $date ?></span>
                      <span>Shiko</span>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div> 
         
        <?php }} else{
            
            ?>
		<div class="notice show">
          <div class="notice-icon"><i class="fa fa-info-circle"></i></div>
          <p>Ska rezultat! Na vjen keq provo apet nashta t del najsen  !!!!!.</p>
       
        </div>
        
        <?php
	}
        
        ?>

        </div>
      </section>
    </main>
  </div>




