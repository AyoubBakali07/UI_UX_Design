<!DOCTYPE html>
<html lang="en">
<style>
        .hidden {
      display: none;
    }

</style>
<?php
include_once '../../layouts/head.php';
?>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
        include_once '../../layouts/nav.php'; // Navigation bar
        include_once '../../layouts/aside.php'; // Sidebar
        ?>

        <!-- Main Content -->
        <main class="py-4">
            <div class="content-wrapper">
                <div class="container mt-4">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Course Sections and Lectures</h3>
                        </div>
                        <!--  -->
                        <div class="card border-info mt-2">
    <!-- Card Header with toggle functionality -->
    <div class="card-header border-primary bg-light text-info" style="cursor: pointer;" onclick="toggleCardBody('cardBody1')">
      Card Header 1
    </div>

    <!-- Collapsible Card Body -->
    <div id="cardBody1" class="card-body border-primary hidden">
      <!-- Section 1 -->
      <section class="mb-3 pb-3 border-bottom">
        <div class="d-flex align-items-center justify-content-between">
          <p class="mb-0">Introduction to Eloquent ORM</p>
          <button class="btn btn-primary mr-3" onclick="openEditModal('Introduction to Eloquent ORM')">Edit</button>
        </div>
      </section>
      <!-- Section 2 -->
      <section class="mb-3 pb-3 border-bottom">
        <div class="d-flex align-items-center justify-content-between">
          <p class="mb-0">Advanced Eloquent Techniques</p>
          <button class="btn btn-primary mr-3" onclick="openEditModal('Advanced Eloquent Techniques')">Edit</button>
        </div>
      </section>
    </div>
  </div>

  <div class="card border-info mt-2">
    <!-- Card Header with toggle functionality -->
    <div class="card-header border-primary bg-light text-info" style="cursor: pointer;" onclick="toggleCardBody('cardBody2')">
      Card Header 2
    </div>

    <!-- Collapsible Card Body -->
    <div id="cardBody2" class="card-body border-primary hidden">
      <!-- Section 1 -->
      <section class="mb-3 pb-3 border-bottom">
        <div class="d-flex align-items-center justify-content-between">
          <p class="mb-0">Introduction to Eloquent ORM</p>
          <button class="btn btn-primary mr-3" onclick="openEditModal('Introduction to Eloquent ORM')">Edit</button>
        </div>
      </section>
      <!-- Section 2 -->
      <section class="mb-3 pb-3 border-bottom">
        <div class="d-flex align-items-center justify-content-between">
          <p class="mb-0">Advanced Eloquent Techniques</p>
          <button class="btn btn-primary mr-3" onclick="openEditModal('Advanced Eloquent Techniques')">Edit</button>
        </div>
      </section>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit Status and Links</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" placeholder="Enter your status">
          </div>
          <div class="form-group">
            <label for="githubLink">GitHub Link</label>
            <input type="url" class="form-control" id="githubLink" placeholder="Enter your GitHub link">
          </div>
          <div class="form-group">
            <label for="projectLink">Project Link</label>
            <input type="url" class="form-control" id="projectLink" placeholder="Enter your project link">
          </div>
          <div class="form-group">
            <label for="slideLink">Slide Link</label>
            <input type="url" class="form-control" id="slideLink" placeholder="Enter your slide link">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="saveChanges()">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function toggleCardBody(cardBodyId) {
      const cardBody = document.getElementById(cardBodyId);
      if (cardBody.classList.contains('hidden')) {
        cardBody.classList.remove('hidden');
      } else {
        cardBody.classList.add('hidden');
      }
    }

    function openEditModal(sectionTitle) {
      // You can use sectionTitle for custom behavior or display
      document.getElementById('editModalLabel').innerText = 'Edit ' + sectionTitle;
      $('#editModal').modal('show');
    }

    function saveChanges() {
      const status = document.getElementById('status').value;
      const githubLink = document.getElementById('githubLink').value;
      const projectLink = document.getElementById('projectLink').value;
      const slideLink = document.getElementById('slideLink').value;
      
      // Handle saving the changes, for example, saving to the server or updating UI
      
      console.log('Status:', status);
      console.log('GitHub:', githubLink);
      console.log('Project:', projectLink);
      console.log('Slides:', slideLink);
      
      // Close modal after saving
      $('#editModal').modal('hide');
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

                        <!--  -->
                          
</body>

</html>
