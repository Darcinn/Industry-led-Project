<?php

session_start();

$currentPage = 'movies';
if (isset($_SESSION['user_id'])) {
    include('includes/header_loggedin.php');
} else {
    include('includes/header.php');
}

require('includes/connect_db.php');

$id = $_SESSION['user_id'];

$q = "UPDATE users SET subscribed=1 WHERE user_id='$id'";
$r = @mysqli_query($link, $q);
if ($r) {
    alert("Payment successful, you are now subscribed.");
    $_SESSION['subscribed'] = 1;
    header("Location: user_login.php");
}

function alert($msg)
{
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
