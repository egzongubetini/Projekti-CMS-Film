<?php

$random = 'active';
include 'include/header.php';
include 'include/category.php';
include 'db.php';




?>
  

 
 

      <section id="content" class="inner-container">

        
         <div class="item-container">

       <?php

 

	$limit = 24;

	if (isset($_GET['page_no'])) {
	    $page_no = mysqli_real_escape_string($connection,$_GET['page_no']);
	}else{
	    $page_no = 1;
	}

	$offset = ($page_no-1) * $limit;

	$query = "SELECT * FROM filmi WHERE statusi='show' ORDER BY RAND() LIMIT $offset, $limit";

	$result = mysqli_query($connection, $query);


	if (mysqli_num_rows($result) > 0) {
    
    ?>


    <?php
	 while($rows = mysqli_fetch_assoc($result)) {
             
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
                  <img src="/<?php echo $film_foto ?>" alt="Archive">
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
          
       
          
<?php

    } 

?>


<?php
	$sql = "SELECT * FROM filmi WHERE statusi='show' ORDER BY RAND()";

	$records = mysqli_query($connection, $sql);

	$totalRecords = mysqli_num_rows($records);

	$totalPage = ceil($totalRecords/$limit);
?>
	<div class="pagination">
<?php
	for ($i=1; $i <= $totalPage ; $i++) { 
	   if ($i == $page_no) {
		$active = "current";
	   }else{
		$active = "";
	   } 

?>

         <span id="<?php echo $i ?>" class="<?php echo $active?>"><a id="<?php echo $i ?>" class='inactive' href='/random/<?php echo $i ?>'><?php echo $i ?></a></span>
         <?php
	}
    ?>

	</div>

          <div class='resppages'>
            <a href="/random/<?php echo $i ?>"><span class="fa fa-caret-right"></span>
            </a></div>


	
<?php
	}else {
    
    echo '<div class="notice show">
          <div class="notice-icon"><i class="fa fa-info-circle"></i></div>
          <p>Kjo faqe nuk u gjend na vjen keq.</p>
       
        </div>'; }

?>
        </div>
      </section>
    </main>
  </div>