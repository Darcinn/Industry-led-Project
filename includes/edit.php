<?php

session_start();

$db = require('connect_db.php');


# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id'])) {

  $db;

  $errors = array();

  $id = $_POST['user_id'];

  if (!empty($_POST['first_name'])) {
    $fn = trim($_POST['first_name']);
    $q = "UPDATE users SET first_name='$fn' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
    $_SESSION[ 'first_name' ] = $fn;
  }

  if (!empty($_POST['last_name'])) {
    $ln = trim($_POST['last_name']);
    $q = "UPDATE users SET last_name='$ln' WHERE user_id='$id'";
    $r = @mysqli_query($link, $q);
    $_SESSION[ 'last_name' ] = $ln;
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
