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

include('includes/booking-table.php');

include('includes/footer.php');
