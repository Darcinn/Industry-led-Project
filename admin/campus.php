<?php

session_start();

if ($_SESSION['account_level'] == "2") {
    include('includes/admin-header.php');
} else {
    header("Location: ../login.php");
}

?>

<div id="layoutSidenav">
    <?php

    include('includes/sidenav.php');

    ?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Genres</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="admin.php">Dashboard</a></li>
                    <li class="breadcrumb-item">Content</li>
                    <li class="breadcrumb-item active">Genres</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        This page displays all of the various genres available on Webflix as well as howq much content is associated with each of them.
                    </div>
                </div>
                <?php
                include('includes/genre-table.php');
                ?>
            </div>
        </main>

        <?php

        include('includes/footer.php');

        ?>