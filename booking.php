<?php

session_start();

$currentPage = 'booking';
if (isset($_SESSION['user_id']) && $_SESSION['account_status'] == 2) {
  include('includes/header_loggedin.php');
} else if ($_SESSION['user_id'] == 1) {
  header("Location: user_account.php");
} else {
  header("Location: login.php");
}

?>

<header class="masthead light-text" id="index-mast">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h4>Edinburgh College Fleet Management</h4>
          <span class="subheading">Getting you the places you need to go, when you need to get there.</span>
        </div>
      </div>
    </div>
  </div>
</header>

<hr>

<div class="container light-text">
  <div class="row featurette">
    <div class="col-md-7">
      <h4 class="featurette-heading"><span><em>Payments with PayPal.</em></span></h4>
      <p class="lead">PayPal is an American company operating an online payments system in the majority of countries that support online money transfers, and serves as an electronic alternative to traditional paper methods like checks and money orders. </p>
    </div>
    <div class="col-md-3">
      <a href="https://www.paypal.com">
        <img class="img-fluid mx-auto" src="https://i.imgur.com/Kp0vNxg.png" alt="Paypal Poster">
      </a>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading">Watch <span><em>everywhere.</em></span></h2>
      <hr>
      <h4 class="lead">Stream unlimited films and TV programmes on your phone, tablet, laptop and TV without paying more.</h4>
    </div>
    <div class="col-md-3 order-md-1">
      <img class="img-fluid mx-auto" src="https://assets.nflxext.com/ffe/siteui/acquisition/ourStory/fuji/desktop/device-pile.png" alt="Generic placeholder image">
    </div>
  </div>

  <hr class="featurette-divider">

</div>

<?php

include('includes/footer.php');


?>