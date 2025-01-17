<!DOCTYPE html>
<html lang="en">

<?php
include_once '../layouts/head.php';
?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        include_once '../layouts/nav.php'; // Navigation bar
        include_once '../layouts/aside.php'; // Sidebar
        ?>

        <!-- Main Content -->
        <main class="py-4">
            <div class="content-wrapper">
                <div class="container mt-4">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Scrollable Horizontal Cards</h3>
                        </div>
                        <!-- Horizontal Scrollable Card Section -->
                        <div class="card-body">
                            <div class="d-flex overflow-auto" style="gap: 1rem;"> <!-- Scrollable container -->
                                <!-- Card 1 -->
                                <div class="card" style="width: 15rem; flex-shrink: 0;">
                                    <img src="../lv.png" class="card-img-top" alt="Card 1">
                                    <div class="card-body">
                                        <h5 class="card-title">Front End HTML/CSS</h5>
                                        <p class="card-text">Some quick example.</p>
                                        <a href="Sanction Rules/create.php" class="btn btn-primary">Enroll Now</a>
                                    </div>
                                </div>

                                <!-- Card 2 -->
                                <div class="card" style="width: 15rem; flex-shrink: 0;">
                                    <img src="../lv.png" class="card-img-top" alt="Card 2">
                                    <div class="card-body">
                                        <h5 class="card-title">PHP</h5>
                                        <p class="card-text">Some quick example.</p>
                                        <a href="Sanction Rules/create.php" class="btn btn-primary">Enroll Now</a>
                                    </div>
                                </div>

                                <!-- Card 3 -->
                                <div class="card" style="width: 15rem; flex-shrink: 0;">
                                    <img src="../lv.png" class="card-img-top" alt="Card 3">
                                    <div class="card-body">
                                        <h5 class="card-title">Laravel</h5>
                                        <p class="card-text">Some quick example.</p>
                                        <a href="Sanction Rules/create.php" class="btn btn-primary">Enroll Now</a>
                                    </div>
                                </div>

                                <!-- Card 4 -->
                                <div class="card" style="width: 15rem; flex-shrink: 0;">
                                    <img src="../lv.png" class="card-img-top" alt="Card 4">
                                    <div class="card-body">
                                        <h5 class="card-title">JavaScript Basics</h5>
                                        <p class="card-text">Some quick example.</p>
                                        <a href="Sanction Rules/create.php" class="btn btn-primary">Enroll Now</a>
                                    </div>
                                </div>

                                <!-- Card 5 -->
                                <div class="card" style="width: 15rem; flex-shrink: 0; overflow:hidden:">
                                    <img src="../lv.png" class="card-img-top" alt="Card 5">
                                    <div class="card-body">
                                        <h5 class="card-title">Laravel</h5>
                                        <p class="card-text">Some quick example.</p>
                                        <a href="Sanction Rules/create.php" class="btn btn-primary">Enroll Now</a>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mr-3">Mes Informations</h1>
                            <table class="table table-bordered border-primary">
                    <thead class="background-primary ">
                        <tr>
                        <th scope="col">Course name</th>
                        <th scope="col">Start</th>
                        <!-- <th scope="col">Label</th> -->
                        <th scope="col">Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row ">HTML/CSS</th>
                        <td>May 12</td>
                        <!-- <td>Otto</td> -->
                        <td><span class="badge badge-primary">100%</span></td>
                        </tr>
                        <tr>
                        <th scope="row">PHP Eloquent</th>
                        <td>Junary 03</td>
                        <!-- <td>Test</td> -->
                    <td><div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                    </div></td>
                    </tr> 
    <!-- <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> -->
  </tbody>
</table>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <?php
        include_once '../layouts/footer.php'; // Footer
        ?>
    </div>
    <?php
    include_once '../layouts/script-link.php'; // Scripts for Bootstrap and other dependencies
    ?>
</body>

</html>