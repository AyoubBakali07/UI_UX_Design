<!DOCTYPE html>
<html lang="en">

<?php
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
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Sanction Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Sanction Title:</label>
                            <div class="col-sm-9">Late Arrival</div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Description:</label>
                            <div class="col-sm-9">For arriving late more than 15 minutes.</div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Maximum Absences:</label>
                            <div class="col-sm-9">3</div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Notification Threshold:</label>
                            <div class="col-sm-9">2</div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Penalty:</label>
                            <div class="col-sm-9">Warning</div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Sanction Duration:</label>
                            <div class="col-sm-9">1 Day</div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Effective Date:</label>
                            <div class="col-sm-9">2025-01-01</div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 fw-bold">Comments/Notes:</label>
                            <div class="col-sm-9">First offense will be a warning.</div>
                        </div>
                        <div>
                            <form action="">
                                <a href="../dashboard.php" class="btn btn-secondary">Back</a>
                            </form>
                        </div>
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