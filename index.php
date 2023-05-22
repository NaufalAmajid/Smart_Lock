<?php
$page = '';
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Dashboard Admin - SmartLog</title>
  <meta content="" name="description" />
  <meta content="" name="keywords" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet" />

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="" /> <!-- Logo -->
        <span class="d-none d-lg-block">Smart Lock</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle" href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" />
            <span class="d-none d-md-block dropdown-toggle ps-2">Nama Yang Login</span></a>
          <!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>
          </ul>
          <!-- End Profile Dropdown Items -->
        </li>
        <!-- End Profile Nav -->
      </ul>
    </nav>
    <!-- End Icons Navigation -->
  </header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link <?= $page == '' ? '' : 'collapsed' ?>" href="index.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->

      <li class="nav-heading">Components</li>

      <li class="nav-item">
        <a class="nav-link <?= $page == 'access_log' ? '' : 'collapsed' ?>" href="?page=access_log">
          <i class="bi bi-menu-button-wide"></i><span>Access Log</span>
        </a>
      </li>
      <!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link <?= $page == 'rfid_tag' ? '' : 'collapsed' ?>" href="?page=rfid_tag">
          <i class="bi bi-journal-text"></i><span>RFID Tag</span>
        </a>
      </li>
      <!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link <?= $page == 'rfid_user_recovery' ? '' : 'collapsed' ?>" href="?page=rfid_user_recovery">
          <i class="bi bi-layout-text-window-reverse"></i><span>RFID User Recovery</span>
        </a>
      </li>
      <!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link <?= $page == 'users' ? '' : 'collapsed' ?>" href="?page=users">
          <i class="bi bi-person-lines-fill"></i><span>Users</span>
        </a>
      </li>
      <!-- End Charts Nav -->

      <li class="nav-heading">Session</li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-box-arrow-right"></i><span>Logout</span>
        </a>
      </li>
      <!-- End Charts Nav -->
    </ul>
  </aside>
  <!-- End Sidebar-->

  <main id="main" class="main">
    <!-- CONTENT HERE -->
    <?php
    if (isset($_GET['page'])) {
      if ($_GET['page'] == 'access_log') {
        include 'menu/access_log.php';
      } elseif ($_GET['page'] == 'rfid_tag') {
        include 'menu/rfid_tag.php';
      } elseif ($_GET['page'] == 'rfid_user_recovery') {
        include 'menu/rfid_user_recovery.php';
      } elseif ($_GET['page'] == 'users') {
        include 'menu/users.php';
      }
    } else {
      include 'menu/dashboard.php';
    }
    ?>
    <!-- END CONTENT -->
  </main>
  <!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/jquery-3.7.0.min.js"></script>

  <script>
    function OpenModal(link, data, place) {
      $.ajax({
        url: link,
        type: 'POST',
        data: data,
        success: function(result) {
          $(`#${place}`).html(result);
          $(`#${place}`).modal('show');
        }
      })
    }
  </script>
</body>

</html>