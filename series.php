<?php

session_start();

$currentPage = 'tv';
if (isset($_SESSION['user_id'])) {
  include('includes/header_loggedin.php');
} else {
  header("Location: user_login.php");
}

# Get passed movie id and assign it to a variable.
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

# Open database connection.
require('includes/connect_db.php');

$q = "SELECT * FROM tv WHERE tv_id = '$id'";
$r = mysqli_query($link, $q);

#Create conditional if statement which will execute code if the condition is TRUE.
if (mysqli_num_rows($r) > 0) {


  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '
    <br>
    <h1 class="mb-3 text-center light-text"><strong>'  . $row['tv_title'] . '</strong></h1>
    <div class="container">
    <hr class="featurette-divider ">
    </div>
     <iframe src="'  . $row['tv_trailer'] . '" width="100%" height="650" frameborder="0" allowfullscreen></iframe>

     <div class="container">
     <hr class="featurette-divider">
     </div>

     <div class="container text-center">
     <h2 class="light-text">Genre: '  . $row['tv_genre'] . ' </h2>
     <div class="container">
     <hr class="featurette-divider">
     </div>
     <h2 class="light-text">Synopsis</h2>
     <div class="container">
     <br>
     </div>
      <h2 class="light-text">'  . $row['tv_desc'] . '</h2>
    </div>
    </div>
  
  ';
  }
}

$g = "SELECT * FROM tv WHERE tv_id='$id'";
$n = mysqli_query($link, $g);
if (mysqli_num_rows($n) > 0) {
  while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {

    $r = mysqli_query($link, "SELECT * FROM episode WHERE tv_id = '{$row['tv_id']}'");
    if (mysqli_num_rows($r) > 0) {
      # Display body section.
?>
      <br>
      <div>
        <div class="container text-center">
          <h1 class="light-text"><?php echo "{$row['tv_title']}"; ?> Episodes</h1>
        </div>
        <div class="responsive-slick">
          <?php
          while ($epi = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
          ?>
            <div class="slider-image">
              <a href="episode.php?id=<?php echo $epi['episode_id']; ?>">
                <img src="<?php echo "{$epi['episode_img']}"; ?>" class="slider-img" alt="<?php echo "{$epi['episode_title']}"; ?>">
                <div class="info">
                  <h2 class="slider-heading"><?php echo "{$epi['episode_name']}"; ?></h2>
                </div>
              </a>
            </div>
        <?php
          }
        } else {
          echo '        
          <br>
          <div class="container text-center">
          <h1 class="light-text">'.$row['tv_title'].' Episodes</h1>
          </div>
          <div class="container">
          <hr class="featurette-divider ">
          </div> 
          <h3 class="mb-3 light-text text-center"><strong>There are no available episodes currently.</strong></h1>
          <div class="container">
          <hr class="featurette-divider ">
          </div> 
          ';
        }
        ?>

        </div>
      </div>
  <?php
  }
  mysqli_close($link);
}
  ?>

  </div>

  <?php

  require('includes/footer.php');

  ?>