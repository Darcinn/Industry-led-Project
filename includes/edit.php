<?php

session_start();

$db = require('connect_db.php');


# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {

  $db;

  $errors = array();

  $id = $_POST['user_id'];

  if (!empty($_POST['forename'])) {
    $fn = trim($_POST['forename']);
    $q = "UPDATE users SET forename='$fn' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
    $_SESSION['forename'] = $fn;
  }

  if (!empty($_POST['surname'])) {
    $ln = trim($_POST['surname']);
    $q = "UPDATE users SET surname='$ln' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
    $_SESSION['surname'] = $ln;
  }

  if (!empty($_POST['check_code'])) {
    $ln = trim($_POST['check_code']);
    $q = "UPDATE users SET check_code='$ln' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
    $_SESSION['check_code'] = $ln;
  }

  if (!empty($_POST['license_expiry'])) {
    $ln = trim($_POST['license_expiry']);
    $q = "UPDATE users SET license_expiry='$ln' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
    $_SESSION['license_expiry'] = $ln;
  }

  mysqli_close($link);

  foreach ($errors as $msg) {
    alert($msg);
  }

  header("Refresh:0; url=../user_login.php");
}

function alert($msg)
{
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
