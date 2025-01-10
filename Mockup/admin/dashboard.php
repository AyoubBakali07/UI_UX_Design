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
                                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Card 1">
                                    <div class="card-body">
                                        <h5 class="card-title">HTML/CSS</h5>
                                        <p class="card-text">Some quick example.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>

                                <!-- Card 2 -->
                                <div class="card" style="width: 15rem; flex-shrink: 0;">
                                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Card 2">
                                    <div class="card-body">
                                        <h5 class="card-title">PHP Eloquent</h5>
                                        <p class="card-text">Some quick example.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>

                                <!-- Card 3 -->
                                <div class="card" style="width: 15rem; flex-shrink: 0;">
                                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Card 3">
                                    <div class="card-body">
                                        <h5 class="card-title">PHP OOP</h5>
                                        <p class="card-text">Some quick example.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>

                                <!-- Card 4 -->
                                <div class="card" style="width: 15rem; flex-shrink: 0;">
                                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Card 4">
                                    <div class="card-body">
                                        <h5 class="card-title">JavaScript Basics</h5>
                                        <p class="card-text">Some quick example.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>

                                <!-- Card 5 -->
                                <div class="card" style="width: 15rem; flex-shrink: 0; overflow:hidden:">
                                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Card 5">
                                    <div class="card-body">
                                        <h5 class="card-title">Laravel</h5>
                                        <p class="card-text">Some quick example.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <h1>test</h1>
                            <table class="table table-bordered">
  <thead class="background-primary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
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
