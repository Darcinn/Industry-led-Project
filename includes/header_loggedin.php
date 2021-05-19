<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/mdb.min.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick.css" />
  <link rel="stylesheet" type="text/css" href="slick/slick-theme.css" />
  <link rel="stylesheet" href="css/custom.css">


  <!--mystylesheet-->
  <title>Webflix</title>

  <!-- Hotjar Tracking Code for http://webdev.edinburghcollege.ac.uk/~HNDSOFTS2A4/ -->
  <script>
    (function(h, o, t, j, a, r) {
      h.hj = h.hj || function() {
        (h.hj.q = h.hj.q || []).push(arguments)
      };
      h._hjSettings = {
        hjid: 2213582,
        hjsv: 6
      };
      a = o.getElementsByTagName('head')[0];
      r = o.createElement('script');
      r.async = 1;
      r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
      a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
  </script>

  <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>


</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link <?php if ($currentPage == 'movie') {
                                echo 'active';
                              } ?>" href="../movies.php">Movies<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($currentPage == 'tv') {
                                echo 'active';
                              } ?>" href="../tv.php">Television</a>
        </li>
      </ul>
    </div>
    <div class="mx-auto order-0">
      <a class="navbar-brand" href="index.php"><img class="logo" style="height: 50px; width: 100px;" src="img/Logo.png" alt="ECinema"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <?php
        if ($_SESSION['account_type'] == "2") {
        ?>
          <li class="nav-item <?php if ($currentPage == 'admin') {
                                echo 'active';
                              } ?>">
            <a class="nav-link" href="/admin/admin.php">Admin</a>
          </li>
        <?php
        }
        ?>
        <li class="nav-item <?php if ($currentPage == 'account') {
                              echo 'active';
                            } ?> ">
          <a class="nav-link" href="user_login.php">
            <?php
            $user = $_SESSION['first_name'];
            echo "Hi $user";
            ?>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="logout.php">Sign Out</a>
        </li>
      </ul>
    </div>
  </nav>