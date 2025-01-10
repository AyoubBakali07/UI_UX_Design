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
                        <h3 class="card-title">Sanctions Rules</h3>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Sanction Title</th>
                                        <th>Max Absences</th>
                                        <th>Penalty</th>
                                        <th>Effective Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="sanctionTable">
                                    <!-- Example Rows -->
                                    <tr>
                                        <td>1</td>
                                        <td>Late Arrival</td>
                                        <td>3</td>
                                        <td>Warning</td>
                                        <td>2025-01-01</td>
                                        <td>
                                            <a href="details.php?id=1" class="btn btn-info btn-sm">Details</a>
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Unjustified Absence</td>
                                        <td>1</td>
                                        <td>Suspension</td>
                                        <td>2025-01-05</td>
                                        <td>
                                            <a href="details.php?id=2" class="btn btn-info btn-sm">Details</a>
                                            <button class="btn btn-primary btn-sm">Edit</button>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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