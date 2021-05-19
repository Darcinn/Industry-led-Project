<?php

session_start();

$currentPage = 'tv';
if (isset($_SESSION['user_id']) && $_SESSION['subscribed'] == 1) {
  include('includes/header_loggedin.php');
} else {
  header("Location: user_login.php");
}

require('includes/connect_db.php');

# Get passed movie id and assign it to a variable.
if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

# Open database connection.
require('includes/connect_db.php');

$q = "SELECT * FROM episode WHERE episode_id = '$id'";
$r = mysqli_query($link, $q);

#Create conditional if statement which will execute code if the condition is TRUE.
if (mysqli_num_rows($r) > 0) {


  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '
        <br>
        <h1 class="mb-3 light-text text-center"><strong>Episode '  . $row['episode_number'] . ' - '  . $row['episode_name'] . '</strong></h1>
        <div class="container">
        <hr class="featurette-divider ">
        </div>
         <iframe src="'  . $row['episode_file'] . '" width="100%" height="650" frameborder="0" allowfullscreen></iframe>

         <div class="container">
         <hr class="featurette-divider ">
         </div>
      ';
  }
}



?>

<div id="tvsection">


  <?php

  echo "<br>";

  $x = "SELECT tv_id FROM episode WHERE episode_id = '$id'";
  $y = mysqli_query($link, $x);
  if (mysqli_num_rows($y) > 0) {
    while ($row = mysqli_fetch_array($y, MYSQLI_ASSOC)) {

      $r = mysqli_query($link, "SELECT * FROM episode WHERE tv_id = '{$row['tv_id']}'");
      if (mysqli_num_rows($r) > 0) {
        # Display body section.
  ?>
  
        <h1 class="mb-3 light-text text-center "><strong>Episodes</strong></h1>
        <div style="margin-bottom: 40px;">
          <div class="responsive-slick">
            <?php
            while ($tv = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            ?>
              <div class="slider-image">
                <a href="episode.php?id=<?php echo $tv['episode_id']; ?>">
                  <img style="max-width: 300px; max-height: 175px;" src="<?php echo "{$tv['episode_img']}"; ?>" class="slider-img" alt="<?php echo "{$tv['episode_name']}"; ?>">
                  <div class="info">
                    <h2 class="slider-heading"><?php echo "{$tv['episode_name']}"; ?></h2>
                  </div>
                </a>
              </div>
          <?php
            }
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