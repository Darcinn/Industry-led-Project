<?php

session_start();

$currentPage = 'index';
if (isset($_SESSION['user_id'])) {
  include('includes/header_loggedin.php');
} else {
  include('includes/header.php');
}

?>

<div class="container">



</div>

<?php

include('includes/footer.php');


?>