<?php session_start(); ?>
<!DOCTYPE html>
<html
  lang="es"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>César Nuñez | Admin</title>
    <meta name="description" content="" />
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="http://localhost/bogar/img/logo2_bogar.png" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include("../../components/sidenav_dashboard.html")?>        
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
              id="layout-navbar">
              <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
              </div>

              <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                    Panel de administración
                </div>
                <!-- /Search -->

                <!-- user options -->
                <?php include("../../components/userDropdown_dashboard.php")?>
                <!-- end user options -->
              </div>
          </nav>
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-8">
                        <div class="card-body">
                        <?php
                          if(isset($_SESSION['valid'])) {				
                            include('../../connection/config.php');			
                            $result = mysqli_query($mysqli, "SELECT * FROM user");
                          }
                        ?>
                          <h5 class="card-title text-primary">Bienvenido <?php echo $_SESSION['name'] ?>
                            <i class="bi bi-emoji-laughing"></i>
                            </h5>
                          <p class="mb-4">
                            Este es el panel de administración de tu portafolio, aquí podrás administrar tus datos de acceso, blog, servicios y datos sobre ti.
                          </p>
                        </div>
                      </div>
                      <div class="col-sm-4 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="assets/img/illustrations/man-with-laptop-light.png"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-12">
                  Accedes a las herramientas de administración.
                  <div class="demo-inline-spacing">
                    <a href="http://localhost/bogar/views/dashboard/blog/admin-entrada.php" class="btn rounded-pill btn-outline-primary">
                      <i class="bi bi-journal-text menu-icon tf-icons bx bx-layout"></i>&nbsp;
                      Administrar Blog
                    </a>
                    <a href="http://localhost/bogar/blog.php" class="btn rounded-pill btn-outline-primary" target="_blank">
                      <i class="bi bi-box-arrow-up-right"></i>&nbsp; 
                      Ver blog
                    </a>
                    <a href="http://localhost/bogar/views/dashboard/portafolio/admin-index.php" class="btn rounded-pill btn-outline-primary">
                      <i class="bi bi-layout-sidebar menu-icon tf-icons bx bx-dock-top"></i>&nbsp;
                      Administrar portafolio
                    </a>
                    <a href="http://localhost/bogar/index.php" class="btn rounded-pill btn-outline-primary" target="_blank">
                      <i class="bi bi-box-arrow-up-right"></i>&nbsp; 
                      Ver portafolio
                    </a>
                    <a href="http://localhost/bogar/views/dashboard/portafolio/admin-index.php" class="btn rounded-pill btn-outline-primary">
                      <i class="bi bi-person-lines-fill menu-icon tf-icons bx bx-cube-alt"></i>&nbsp;
                      lista de contactos
                    </a>
                  </div>
                </div>
                <!--/ Order Statistics -->
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  © 2022, Hecho con ❤️ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                    Desarrollado por <a href="https://ricardoiles.github.io/me/" class="footer-link me-4 text-dark" target="_blank">Ricardo Iles</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
