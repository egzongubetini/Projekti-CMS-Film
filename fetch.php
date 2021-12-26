<?php

include 'db.php';




$limit = '16';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT * FROM filmi 
";

if($_POST['query'] != '')  
{
  $query .= '
  WHERE filmi LIKE "%'.str_replace(' ', '%', $_POST['query']).'%" 
  ';
}

$query .= 'ORDER BY film_id ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

 $test = mysqli_query($connection, $query);
 
 $numrat = mysqli_num_rows($test);
 
 
 if(!$numrat == 0) { 
 
  while($rows = mysqli_fetch_assoc($test)) {
             
             $idfilm = $rows['film_id'];
              $film_foto = $rows['film_foto'];
              $film_content = $rows['film_content'];
              $film_link = $rows['film_link'];
               $rate = $rows['film_rate'];
               $date = $rows['film_date'];
               $film_title = $rows['film_title'];
            
            
            
            
        ?> 
        
        
       
     
          <div class="item">
            <a href="film.php?film=<?php echo $idfilm ?>">
              <div class="item-flip">
                <div class="item-inner">
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
        
        
        
 <?php } } else
{
  echo '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}
?>


<div class="pagination">


<?php
$total_links = ceil($numrat/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <span class="current">'.$page_array[$count].'</span>
    ';   
  }
  else
  {

      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }


$output = $page_link

echo $output;

?>