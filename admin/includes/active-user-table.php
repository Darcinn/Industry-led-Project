<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Active Users
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>D.O.B</th>
                        <th>Contact Number</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Forename</th>
                        <th>Surname</th>
                        <th>Email</th>
                        <th>D.O.B</th>
                        <th>Contact Number</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM users";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                            ?>
                            <tr>
                            <td><?php echo "{$row['first_name']}"; ?></td>
                            <td><?php echo "{$row['last_name']}"; ?></td>
                            <td><?php echo "{$row['email']}"; ?></td>
                            <td><?php echo "{$row['date_of_birth']}"; ?></td>
                            <td><?php echo "{$row['contact_no']}"; ?></td>
                            <td><?php if($row[ 'subscribed' ] == "1") {echo "Subscribed";} else {echo "Free Account";} ?></td>
                        </tr>
                        <?php
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>