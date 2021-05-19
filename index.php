<?php

session_start();

$currentPage = 'index';
if (isset($_SESSION['user_id'])) {
  include('includes/header_loggedin.php');
} else {
  include('includes/header.php');
}

require('includes/connect_db.php');
?>

<div class="container col-md-6">

  <?php

  $g = "SELECT * FROM news";
  $n = mysqli_query($link, $g);
  if (mysqli_num_rows($n) > 0) {
    while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
  ?>

      <div class="section">
        <article class="blog-post">
          <br>
          <h2 class="blog-post-title"><?php echo "{$row['post_title']}"; ?></h2>
          <p class="blog-post-meta"><?php echo "{$row['post_date']}"; ?></p>

          <p><?php echo "{$row['post_content']}"; ?></p>

        </article>

        <hr class="featurette-divider bg-dark">
      </div>
  <?php
    }
    mysqli_close($link);
  }

  ?>

</div>

<?php

include('includes/footer.php');


?>