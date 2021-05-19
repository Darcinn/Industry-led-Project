<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">


                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="admin.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-tachometer-alt"></em></div>
                    Dashboard
                </a>


                <div class="sb-sidenav-menu-heading">Management</div>
                <a class="nav-link" href="users.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-book-open"></em></div>
                    Users
                </a>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><em class="fas fa-book-open"></em></div>
                    Content
                    <div class="sb-sidenav-collapse-arrow"><em class="fas fa-angle-down"></em></div>
                </a>

                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                        <a class="nav-link" href="genres.php">
                            Genres
                        </a>

                        <a class="nav-link" href="movies.php">
                            Movies
                        </a>

                        <a class="nav-link" href="tv.php">
                            TV
                        </a>

                    </nav>
                </div>


                <div class="sb-sidenav-menu-heading">Analytics</div>

                <a class="nav-link" href="subscribers.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-chart-area"></em></div>
                    Subscribers
                </a>

                <a class="nav-link" href="sessions.php">
                    <div class="sb-nav-link-icon"><em class="fas fa-table"></em></div>
                    Sessions
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            <?php echo "{$_SESSION['first_name']}"; ?>
        </div>
    </nav>
</div>