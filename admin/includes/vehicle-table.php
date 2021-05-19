<?php

require('../includes/connect_db.php');

?>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Vehicle Table
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="vehicleTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Vehicle ID</th>
                        <th>Campus ID</th>
                        <th>Vehicle Make</th>
                        <th>Vehicle Model</th>
                        <th>Vehicle Colour</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Vehicle ID</th>
                        <th>Campus ID</th>
                        <th>Vehicle Make</th>
                        <th>Vehicle Model</th>
                        <th>Vehicle Colour</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php
                    $g = "SELECT * FROM vehicle";
                    $n = mysqli_query($link, $g);
                    if (mysqli_num_rows($n) > 0) {
                        while ($row = mysqli_fetch_array($n, MYSQLI_ASSOC)) {
                    ?>
                            <tr>
                                <td><?php echo "{$row['vehicle_id']}"; ?></td>
                                <td><?php echo "{$row['campus_id']}"; ?></td>
                                <td><?php echo "{$row['vehicle_make']}"; ?></td>
                                <td><?php echo "{$row['vehicle_model']}"; ?></td>
                                <td><?php echo "{$row['vehicle_colour']}"; ?></td>
                                <td><?php echo "{$row['status']}"; ?></td>
                                <td>
                                    <div class="row">
                                        <a href="#editvehicleModal<?php echo "{$row['vehicle_id']}"; ?>" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-edit"></em> Edit</a></button>
                                        <form action="includes/delete.php" method="post">
                                            <input type="hidden" id="vehicleID" name="vehicle_id" value="<?php echo "{$row['tv_id']}"; ?>">
                                            <button type="submit" name="btnDeleteUsr" class="btn" value=""><em class="fa fa-trash"></em> Delete</button>
                                        </form>
                                    </div>
                                </td>
<!--
                                <div class="modal fade" id="editvehicleModal<?php echo "{$row['tv_id']}"; ?>" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Change Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="includes/edit.php" method="post">
                                                    <input type="hidden" id="tvId" name="tv_id" value="<?php echo "{$row['tv_id']}"; ?>">
                                                    <div class="form-group">
                                                        <input type="text" name="tv_title" class="form-control" placeholder="<?php echo "{$row['tv_title']}"; ?>" value="<?php if (isset($_POST['tv_title'])) {
                                                                                                                                                                                echo $_POST['tv_title'];
                                                                                                                                                                            } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="tv_desc" class="form-control" placeholder="<?php echo "{$row['tv_desc']}"; ?>" value="<?php if (isset($_POST['tv_desc'])) {
                                                                                                                                                                            echo $_POST['tv_desc'];
                                                                                                                                                                        } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <select name="tv_genre" class="form-control">
                                                            <option value="" selected disabled hidden>Change Genre</option>

                                                            <?php
                                                            /*
                                                            $f = "SELECT * FROM genre";
                                                            $a = mysqli_query($link, $f);
                                                            if (mysqli_num_rows($a) > 0) {
                                                                while ($coc = mysqli_fetch_array($a, MYSQLI_ASSOC)) {

                                                            ?>
                                                                    <option value="<?php echo "{$coc['genre_name']}"; ?>"><?php echo "{$coc['genre_name']}"; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            */
                                                            ?>

                                                        </select>

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" name="tv_img" class="form-control" placeholder="<?php echo "{$row['tv_img']}"; ?>" value="<?php if (isset($_POST['tv_img'])) {
                                                                                                                                                                        echo $_POST['tv_img'];
                                                                                                                                                                    } ?>">

                                                    </div>
                                                    <div class="form-group">
                                                        <input type="url" name="tv_trailer" class="form-control" placeholder="<?php echo "{$row['tv_trailer']}"; ?>" value="<?php if (isset($_POST['tv_trailer'])) {
                                                                                                                                                                                echo $_POST['tv_trailer'];
                                                                                                                                                                            } ?>">

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
                                -->

                            </tr>
                    <?php
                        }
                    }

                    ?>
                </tbody>
                <a href="#addvehicleModal" data-toggle="modal" style="text-decoration:none; color:inherit;"><button class="btn"><em class="fa fa-plus"></em> Add New vehicle</a></button>
                <hr>
            </table>
        </div>
    </div>
</div>

<!--
<div class="modal fade" id="addvehicleModal" tabindex="-1" role="dialog" aria-labelledby="details" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Change Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="includes/edit.php" method="post">
                    <div class="form-group">
                        <input type="text" name="new_tv" class="form-control" placeholder="vehicle Name" value="<?php if (isset($_POST['new_tv'])) {
                                                                                                                    echo $_POST['new_tv'];
                                                                                                                } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="text" name="tv_desc" class="form-control" placeholder="vehicle Description" value="<?php if (isset($_POST['tv_desc'])) {
                                                                                                                            echo $_POST['tv_desc'];
                                                                                                                        } ?>" required>

                    </div>
                    <div class="form-group">
                        <select name="tv_genre" class="form-control" required>
                            <option value="" selected disabled hidden>Please Select Genre</option>

                            <?php
                            /*
                            $f = "SELECT * FROM genre";
                            $a = mysqli_query($link, $f);
                            if (mysqli_num_rows($a) > 0) {
                                while ($coc = mysqli_fetch_array($a, MYSQLI_ASSOC)) {

                            ?>
                                    <option value="<?php echo "{$coc['genre_name']}"; ?>"><?php echo "{$coc['genre_name']}"; ?></option>
                            <?php
                                }
                            }
                            */
                            ?>

                        </select>

                    </div>
                    <div class="form-group">
                        <input type="url" name="tv_img" class="form-control" placeholder="Image URL" value="<?php if (isset($_POST['mov_img'])) {
                                                                                                                echo $_POST['mov_img'];
                                                                                                            } ?>" required>

                    </div>
                    <div class="form-group">
                        <input type="url" name="tv_trailer" class="form-control" placeholder="Trailer URL" value="<?php if (isset($_POST['mov_trailer'])) {
                                                                                                                        echo $_POST['mov_trailer'];
                                                                                                                    } ?>" required>

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
-->