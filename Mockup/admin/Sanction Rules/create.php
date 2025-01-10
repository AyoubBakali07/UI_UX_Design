<!DOCTYPE html>
<html lang="en">
<?php
// Define the absolute base path
// define('BASE_PATH', dirname(__DIR__, 2));

// Include the head.php file using the absolute path
// include_once BASE_PATH . '/layouts/head.php';

include_once '../../layouts/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        include_once '../../layouts/nav.php';
        include_once '../../layouts/aside.php';
        ?>
        <main class="py-4">
            <div class="content-wrapper">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Define Sanction Rules</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="define_rule.php" method="POST" class="container ">
                            <div class="form-group">
                                <label for="sanctionTitle">Sanction Title</label>
                                <input type="text" class="form-control" id="sanctionTitle" name="sanctionTitle" placeholder="Enter sanction title" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description of the sanction rule"></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="maxAbsences">Maximum Absences</label>
                                    <input type="number" class="form-control" id="maxAbsences" name="maxAbsences" placeholder="Enter maximum absences" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="notificationThreshold">Notification Threshold</label>
                                    <input type="number" class="form-control" id="notificationThreshold" name="notificationThreshold" placeholder="Enter notification threshold" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="penalty">Penalty</label>
                                <select class="form-control" id="penalty" name="penalty" required>
                                    <option value="" selected disabled>Select a penalty</option>
                                    <option value="Warning">Warning</option>
                                    <option value="Suspension">Suspension</option>
                                    <option value="Expulsion">Expulsion</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="sanctionDuration">Sanction Duration</label>
                                    <input type="number" class="form-control" id="sanctionDuration" name="sanctionDuration" placeholder="Enter duration (optional)">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="durationUnit">Duration Unit</label>
                                    <select class="form-control" id="durationUnit" name="durationUnit">
                                        <option value="" selected disabled>Select duration unit</option>
                                        <option value="Days">Days</option>
                                        <option value="Weeks">Weeks</option>
                                        <option value="Months">Months</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="effectiveDate">Effective Date</label>
                                <input type="date" class="form-control" id="effectiveDate" name="effectiveDate" required>
                            </div>

                            <div class="form-group">
                                <label for="comments">Comments/Notes</label>
                                <textarea class="form-control" id="comments" name="comments" rows="2" placeholder="Enter additional notes (optional)"></textarea>
                            </div>

                            <div class="form-row">
                                <button type="submit" class="btn btn-primary mr-2">Save Rule</button>
                                <button type="reset" class="btn btn-secondary mr-2">Reset</button>
                                <a href="dashboard.php" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </main>
        <?php
        include_once '../../layouts/footer.php';
        ?>
    </div>
    <?php
    include_once '../../layouts/script-link.php';
    ?>
</body>

</html>