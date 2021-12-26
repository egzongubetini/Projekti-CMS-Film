<?php include 'db.php'; ?>




<body class="overview">


  
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
      
 
      <div id="header-secondary">
        <div class="inner-container">
          <nav class="filters">
            <ul>
              <li class="dropdown genre-filter">
                <div class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Zhanri<i class="fa fa-angle-down"></i></div>
                <ul class="dropdown-menu dropdown-menu-large">
                <?php
                $query = "SELECT * FROM zhanre";
                $run = mysqli_query($connection, $query);
                
                while($rows = mysqli_fetch_assoc($run)) {
                    
                           $id = $rows['zhan_id'];         
                            $zhanri = $rows['zhan_title'];
                    
                    
                ?>
             
                
                  <li><a href="/zhanret/<?php echo $zhanri ?>"><?php echo $zhanri ?></a></li>
                <?php } ?>
                </ul>
              </li>
              <li class="dropdown quality-filter">
                <div class="dropdown-toggle" data-toggle="dropdown">Viti<i class="fa fa-angle-down"></i></div>
                <ul class="dropdown-menu">

      <?php 

$query = "SELECT DISTINCT film_date FROM filmi ORDER BY film_date DESC";
$test = mysqli_query($connection, $query);

while($row = mysqli_fetch_array($test)){

$bas = $row['film_date'];

?>



                  <li><a href="/viti/<?php echo $bas ?>"><?php echo $bas ?></a></li>
<?php } ?>
                </ul>
              </li>
              <li class="dropdown abc-filter">
                <div class="dropdown-toggle" data-toggle="dropdown">ABC<i class="fa fa-angle-down"></i></div>
                <ul class="dropdown-menu">
                  <li class="abc"><a href="/index">#</a></li>
                  <li class="abc"><a href="/shkronja/A">A</a></li>
                  <li class="abc"><a href="/shkronja/B">B</a></li>
                  <li class="abc"><a href="/shkronja/C">C</a></li>
                  <li class="abc"><a href="/shkronja/D">D</a></li>
                  <li class="abc"><a href="/shkronja/E">E</a></li>
                  <li class="abc"><a href="/shkronja/F">F</a></li>
                  <li class="abc"><a href="/shkronja/G">G</a></li>
                  <li class="abc"><a href="/shkronja/H">H</a></li>
                  <li class="abc"><a href="/shkronja/I">I</a></li>
                  <li class="abc"><a href="/shkronja/J">J</a></li>
                  <li class="abc"><a href="/shkronja/K">K</a></li>
                  <li class="abc"><a href="/shkronja/L">L</a></li>
                  <li class="abc"><a href="/shkronja/M">M</a></li>
                  <li class="abc"><a href="/shkronja/N">N</a></li>
                  <li class="abc"><a href="/shkronja/O">O</a></li>
                  <li class="abc"><a href="/shkronja/P">P</a></li>
                  <li class="abc"><a href="/shkronja/Q">Q</a></li>
                  <li class="abc"><a href="/shkronja/R">R</a></li>
                  <li class="abc"><a href="/shkronja/S">S</a></li>
                  <li class="abc"><a href="/shkronja/T">T</a></li>
                  <li class="abc"><a href="/shkronja/V">V</a></li>
                  <li class="abc"><a href="/shkronja/W">W</a></li>
                  <li class="abc"><a href="/shkronja/Y">Y</a></li>
                  <li class="abc"><a href="/shkronja/Z">Z</a></li>
                </ul>
              </li>
              <li class="search">
              <form method="post" role="form" id="searchform" autocomplete="off" action="/kerko">
              <i class="fa fa-search" aria-hidden="true"></i>
              <input aria-label=".Kerko.." id="search" name="query" type="search" class="search-input" value="" placeholder="Kerko...">
              </form><div class="live-search"></div>
              </li>
            </ul>
     </nav>
          <p id="slogan">Shiko Film online</p>
        </div>
      </div>