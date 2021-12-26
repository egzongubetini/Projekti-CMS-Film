<?php 


include 'include/header.php';
include 'db.php';

?>

      

   <link href='/stili/kinez.css' rel='stylesheet' type='text/css'>  

<body class="detail">
  <div class="sidebar sb-left">
    <nav class="mobile-nav">
      <ul>
        <li class="<?php if(isset($indeks)) { echo $indeks; } else { echo 'joaktiv'; }?>"><a href="/index"><i class="fa fa-film"></i><span>Te fundit</span></a></li>
        <li class="<?php if(isset($top)) { echo $top; } else { echo 'joaktiv'; }?>"> <a href="/top"><i class="fa fa-trophy"></i><span>Top</span></a></li>
        <li class="<?php if(isset($random)) { echo $random; } else { echo 'joaktiv'; }?>"><a href="/random"><i class="fa fa-random"></i><span>Random</span></a></li>
        <li><a href="https://www.facebook.com/people/Egzon-Gubetini/100004872225914/"><i class="fa fa-envelope"></i><span>Na kontaktoni!</span></a></li>
      </ul>
    </nav>
  </div>
  <div id="site-container">
    <main id="main">
      <header id="main-header">
        <div class="inner-container">
          <div class="sb-toggle-left">
            <span class="menu-icon"></span>
            <span class="menu-icon-text">Menu</span>
          </div>
          <h1><a href="index.php" rel="home" class="logo txt">Egzon<span>Movies</span></a>
          <ul class="header-nav">
            <li><a href="https://facebook.com/" target="_blank" rel="nofollow"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://twitter.com" target="_blank" rel="nofollow"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com/" target="_blank" rel="nofollow"><i class="fa fa-instagram"></i></a></li>
          </ul>
        </div>
      </header>
        <?php
      
      if(isset($_GET['film'])) { 



      
      $idas = mysqli_real_escape_string($connection, $_GET['film']);
      
      $query = "SELECT * FROM filmi WHERE film_id='$idas'"; 
      $ije = mysqli_query($connection, $query);
      $opas = mysqli_num_rows($ije);
      
 
       if($opas == 1) {
      $rows = mysqli_fetch_array($ije);
      
      
      
      $foto = $rows['film_foto'];
       $title = $rows['film_title'];
       $zhanri = $rows['zhan_id'];
 $content = $rows['film_content'];
 $link = $rows['film_link'];
 $data_filmit = $rows['film_date'];
 $koha = $rows['film_minute'];
 $sllogani = $rows['film_sllogani'];
 $seria = $rows['film_seria'];
       $rate = $rows['film_rate'];
$traileri = $rows['film_trailer'];
$shkarkimi = $rows['film_shkarkim'];
$perqindja = $rate * 10;
$kualieti = $rows['film_kualiteti'];

       
                        $esql = "SELECT * FROM zhanre WHERE zhan_id='$zhanri'";
                                     $dsql = mysqli_query($connection, $esql);
         
                                   $rota = mysqli_fetch_assoc($dsql);
         
                                         $zhan_title = $rota['zhan_title']; 
      
      
      
      ?>



      <section id="content">
        <div class="inner-container">
              <div class="movie-image">
            <img src="/<?php echo $foto ?>" alt="<?php echo $title ?>">
            <a href="#section1"><div class="blue" id="buttonposter">
              <p><i class="fa fa-play-circle" aria-hidden="true"></i>Shiko</p>
            </div></a>
          </div>
          
          
          <div class="movie-info">
            <span class="rating">
              <div class="progress progress-circle" data-percentage="<?php echo $perqindja ?>">
<span class="progress-left">
<span class="progress-bar progress-success">
</span>
</span>
<span class="progress-right">
<span class="progress-bar progress-success">
</span>
</span>
<span class="progress-value">
<?php echo $rate ?></span>
</div>

            </span>
            <h1 class="entry-title"><?php echo $title ?></h1>
            <em class="tagline"><?php echo $sllogani ?></em>
            <div class="movie-data">
              <div class="details">
                <i class="hd"><?php echo $kualieti ?></i>
                <span id='Rated'><?php echo $seria ?></span><span><a href="/viti/<?php echo $data_filmit ?>" rel="tag"><?php echo $data_filmit ?></a></span>|<span><a href="/zhanret/<?php echo $zhan_title ?>"><?php echo $zhan_title ?></a></span>|<span><?php echo $koha ?> min</span>
              </div>
            </div>
            <p class="movie-description">
              <span class="trama"><?php echo $content ?>&hellip;</span>
              <div class="persons"></div>
            </p>
          </div>
          
          <div class="movie-actions">
            <ul class="extra">
              <li id="share">
                <a class="a2a_dd" href="#"><i class="fa fa-heart-o" aria-hidden="true"></i><span>Shperndaje</span></a>
              </li>
              <li id="trailer">
                <a href="<?php echo $traileri ?>" rel="modal" data-modal-type="iframe"><i class="fa fa-youtube-play" aria-hidden="true"></i><span>Trailer</span></a>
              </li>
              <li id="download-button">
                <a href="<?php echo $shkarkimi ?>" rel="nofollow" target="_blank"><i class="fa fa-arrow-down" aria-hidden="true"></i><span>Shkarkoje</span></a>
              </li>
              <li id="streaming-hd">
                <a class="blue" id="videoplayer1" title="360p" href="<?php echo $link ?>" title="360p" rel="modal" data-modal-movie="movie1" data-modal-type="iframe"><i class="fa fa-play" aria-hidden="true"></i><span>Stream <em></em></span></a>
              </li>
              <li id="streaming-hd">
                <a class="blue" id="videoplayer2" title="1080p" href="<?php echo $link ?>" title="1080p" rel="modal" data-modal-movie="movie1" data-modal-type="iframe"><i class="fa fa-play" aria-hidden="true"></i><span>Streaming <em>HD</em></span></a>
              </li>
            </ul>
<div id="section1"></div>
            <ul>
              <li id="play-button">
                <!--<div class="play purple">Watch now in <em>4k</em></div>-->
                <div class="play purple">Reklamo<em>Ketu</em></div>
              </li>
            </ul>
          </div>
          
                    <div class="player">
          <div class="movie-player">
        <div class="player-placeholcer">

              <div id="plx">
                

    <p><iframe width="100%" height="450"  src="<?php echo $link ?>" frameborder="0" allow="autoplay" autoplay="1" allowfullscreen=""></iframe></p>

<div id="active_server" data-server="2"></div>
          </div> 
        </div> 
    </div>
    </div> 

          <section class="disqus">
            <div class="inner-container">
              <div id="disqus_thread"></div>
            </div>
          </section>
        </div>
        <div id="slideshow">
        </div>
      </section>
    </main>
  </div>
  
</body>
</html>

<script>
$(function() {
    $('a[href*=\\#]:not([href=\\#])').on('click', function() {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
        if (target.length) {
            $('html,body').animate({
                scrollTop: target.offset().top
            }, 1000);
            return false;
        }
    });
});
</script>

      <?php 

}else
{ header("Location: /index"); }
} ?>
      