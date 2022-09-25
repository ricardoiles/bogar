<?php session_start(); ?>

<?php
  if(isset($_SESSION['valid'])) {				
    include('../../../connection/config.php');		
    $result = mysqli_query($mysqli, "SELECT * FROM user");
  }
?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: ../../../sign-in.php');
}
?>
<?php

//including the database connection file
include_once("../../../connection/config.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM blog where id_entrada =".$_GET['id_entrada']);
?>

<?php 
  include('../../../components/head_dashboard.html');
?>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        
        <?php include('../../../components/sidenav_dashboard.html'); ?>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            <nav
                class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <!-- Search -->
                <div class="navbar-nav align-items-center">
                    Editar entrada
                </div>
                <!-- /Search -->

                <!-- user options -->
                <?php include('../../../components/userDropdown_dashboard.php'); ?>
                <!-- end user options -->
                </div>
            </nav>
            <!-- / Navbar -->            
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- message nueva entrada -->
              <div class="row">
                <!-- card editar datos de entrada -->
                <!-- <div class="col-md-12 col-lg-6 col-xl-12 order-0 mb-4"> -->
                <div class="col-lg-6">
                  <?php
                      while($res = mysqli_fetch_array($result)) {	
                  ?>
                  <h6 class="text-dark">
                      <i class="bi bi-pencil"></i> &nbsp;
                      Editar entrada <span class="text-primary"> <?php echo $res['titulo_entrada'];?></span>
                  </h6>
                  
                  <!-- Editar entrada form -->
                  
                      <div class="card mb-4">
                          <div class="card-body">
                              <form action="update_controller.php" method="post" name="editar_entrada_form">
                                  <div class="mb-3">
                                      <label class="form-label" for="basic-default-fullname">Fecha entrada</label>
                                      <input name="input_fecha" type="text" class="form-control" id="basic-default-fullname" value="<?php echo $res['fecha_entrada'];?>">
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label" for="basic-default-company">Titulo entrada</label>
                                      <input name="input_titulo" maxlength="50" type="text" class="form-control" id="basic-default-company" value="<?php echo $res['titulo_entrada'];?>">
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label" for="basic-default-email">Categoría</label>
                                      <div class="input-group input-group-merge">
                                          <input name="input_categoria" maxlength="30" type="text" id="basic-default-email" class="form-control" value="<?php echo $res['categoria_entrada'];?>" aria-label="john.doe" aria-describedby="basic-default-email2">
                                      </div>
                                      <div>
                                  </div>
                                  <div class="mb-3">
                                      <label class="form-label" for="basic-default-message">Entrada</label>
                                      <textarea name="input_entrada" id="basic-default-message" class="form-control"><?php echo $res['titulo_entrada'];?></textarea>
                                  </div>
                                  <input type="submit" name="actualizar" class="btn btn-primary" value="Actualizar"/>
                                  <a href="admin-entrada.php" class="btn btn-secondary">Cancelar</a>
                              </form>
                          </div>
                      </div>
                  
                  <?php
                  }
                  ?>  
                </div>
                <!--/ card editar datos de entrada -->
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , Hecho con ❤️ by
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
    
    </div>
    <!-- Core JS -->
    <!-- build:js ../assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
