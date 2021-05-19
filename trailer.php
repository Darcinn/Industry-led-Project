<?php

session_start();

$currentPage = 'movie';
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

$q = "SELECT * FROM movie WHERE mov_id = '$id'";
$r = mysqli_query($link, $q);

#Create conditional if statement which will execute code if the condition is TRUE.
if (mysqli_num_rows($r) > 0) {


  while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    echo '
    <br>
    <h1 class="mb-3 light-text text-center"><strong>'  . $row['mov_title'] . '</strong></h1>
    <div class="container">
    <hr class="featurette-divider ">
    </div>
     <iframe src="'  . $row['mov_trailer'] . '" width="100%" height="650" frameborder="0" allowfullscreen></iframe>

     <div class="container">
     <hr class="featurette-divider">
     </div>

     <div class="container text-center">
     <h2 class="light-text">Genre: '  . $row['mov_genre'] . ' </h2>
     <div class="container">
     <hr class="featurette-divider">
     </div>
     <h2 class="light-text">Synopsis</h2>
     <div class="container">
     <br>
     </div>
      <h2 class="light-text">'  . $row['mov_desc'] . '</h2>
      <br>
    </div>
    </div>
  
  ';
    }
}

?>

<?php

require('includes/footer.php');

?>
