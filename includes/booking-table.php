<?php

require('includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Your Bookings
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="vehicleTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Vehicle Booked</th>
                        <th>Booked Start Time</th>
                        <th>Booked End Time</th>
                        <th>Destination</th>
                        <th>Purpose</th>
                        <th>Passenger Count</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Booking ID</th>
                        <th>Vehicle Booked</th>
                        <th>Booked Start Time</th>
                        <th>Booked End Time</th>
                        <th>Destination</th>
                        <th>Purpose</th>
                        <th>Passenger Count</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM booking WHERE user_id='{$_SESSION['user_id']}'";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['booking_id']}"; ?></td>
                                <td>
                                    <?php
                                    $q = "SELECT vehicle_reg FROM vehicle WHERE vehicle_id = '{$row['vehicle_id']}'";
                                    $r = mysqli_query($link, $q);
                                    if (mysqli_num_rows($r) == 0) {
                                        echo "No Vehicle Assigned";
                                    } else {
                                        $cam = mysqli_fetch_array($r, MYSQLI_ASSOC);

                                        echo "{$cam['vehicle_reg']}";
                                    }
                                    ?>
                                </td>
                                <td><?php echo "{$row['booking_time']}"; ?></td>
                                <td><?php echo "{$row['booking_return']}"; ?></td>
                                <td><?php echo "{$row['booking_destination']}"; ?></td>
                                <td><?php echo "{$row['booking_purpose']}"; ?></td>
                                <td><?php echo "{$row['booking_passengers']}"; ?></td>
                                <td>
                                    <div class="row">
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="vehicleID" name="vehicle_id" value="<?php echo "{$row['vehicle_id']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                    <?php
                        }
                    }

                    ?>
                </tbody>
                <a href="#newBookingModal" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-plus"></em> New Booking</a></button>
                <hr>
            </table>
        </div>
    </div>
</div>


<div class="modal fade" id="newBookingModal" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">New Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/edit.php" method="post">
                    <div class="form-group">
                        <input type="text" name="booking_destination" class="form-control" placeholder="Destination" value="<?php if (isset($_POST['booking_destination'])) {
                                                                                                                                echo $_POST['booking_destination'];
                                                                                                                            } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="datetime-local" name="booking_time" step="3600" class="form-control" min="<?php echo date('Y-m-d\TH:00'); ?>" placeholder="Destination" value="<?php echo date('Y-m-d\TH'); ?>" required>

                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="submit" name="btnEditUser" class="btn btn-dark btn-block" value="Save Changes" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>