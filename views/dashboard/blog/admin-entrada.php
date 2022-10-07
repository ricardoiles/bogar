<?php session_start(); ?>

<?php
  if(isset($_SESSION['valid'])) {				
    include('../../../connection/config.php');			
    $result = mysqli_query($mysqli, "SELECT * FROM user");
  }
?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: ../../../views/sign-in.php');
}
?>

<?php
//including the database connection file
include_once("../../../connection/config.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM blog WHERE estado_entrada = 1 ORDER BY fecha_entrada desc");

// query entradas eliminadas
$delete_query = mysqli_query($mysqli, "SELECT * FROM blog WHERE estado_entrada = 0 ORDER BY eliminacion_entrada desc");
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
                    Administrar entradas
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
              <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible" role="alert">
                  <?= $_SESSION['message']?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } ?>
              <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
                    <!-- Accordion -->
                    <div class="row">
                        <!-- Entradas publicadas -->
                        <div class="col-md mb-4 mb-md-0">
                          <h6 class="text-dark fw-semibold">
                              <i class="bi bi-check-circle"></i> &nbsp;
                              Entradas publicadas
                          </h6>
                          <?php
                            while($res = mysqli_fetch_array($result)) {	
                            // quitar caracteres y espacios al titulo
                            $str = $res['titulo_entrada'];
                            $string = preg_replace('/[0-9\@\(\)\,\-\_\º\&\$\.\;\" "]+/', '', $str);
                          ?>                                            
                          <div class="accordion mt-3" id="accordionExample">
                              <div class="card accordion-item">
                                  <h2 class="accordion-header" id="headingTwo">
                                      <button
                                      type="button"
                                      class="accordion-button collapsed"
                                      data-bs-toggle="collapse"
                                      data-bs-target="#<?php echo $string ?>"
                                      aria-expanded="false"
                                      aria-controls="<?php echo $string ?>"
                                      >
                                      <?php 
                                        echo $res['titulo_entrada']." <span class='text-secondary'>&nbsp; &middot; &nbsp;</span> <span class='text-primary'>".$res['fecha_entrada']."</span>" ?>
                                      </button>
                                  </h2>
                                  <div
                                    id="<?php echo $string ?>"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionExample"
                                  >
                                      <div class="accordion-body">
                                        <?php echo $res['entrada']?>
                                        
                                        <hr>
                                        <span class="card-link">
                                          <i class="bi bi-columns-gap"></i>
                                          <?php echo $res['categoria_entrada']?>
                                        </span>
                                        <span class="card-link">
                                          <i class="bi bi-chat-square"></i>
                                          <?php echo $res['comentarios_entrada']?> Comentarios
                                        </span>
                                        <div class="demo-inline-spacing text-end">
                                          <a 
                                            href="edit_entrada.php?id_entrada=<?php echo $res['id_entrada']?>"
                                            type="button" 
                                            class="btn rounded-pill btn-icon btn-outline-primary"
                                            >
                                            <span class="tf-icons bx"><i class="bi bi-pencil"></i></span>
                                          </a>
                                          <a
                                            href="../../../single-blog.php?id_blog=<?php echo $res['id_entrada']?>" target="_blank"
                                            type="button" class="btn rounded-pill btn-icon btn-outline-secondary">
                                            <span class="tf-icons bx "><i class="bi bi-eye"></i></span>
                                          </a>
                                          <a
                                            href="../../../controllers/blog/delete_entradaController.php?id_entrada=<?php echo $res['id_entrada']?>"
                                            type="button" class="btn rounded-pill btn-icon btn-outline-danger">
                                            <span class="tf-icons bx "><i class="bi bi-trash3"></i></span>
                                          </a>
                                        </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <?php
                            }
                          ?>  
                        </div>
                        <!-- Entradas eliminadas -->
                        <div class="col-md mb-4 mb-md-0">
                            <h6 class="text-dark fw-semibold">
                                <i class="bi bi-trash3"></i> &nbsp;
                                Entradas Eliminadas
                            </h6>
                            <?php
                            while($delete = mysqli_fetch_array($delete_query)) {	
                            
                            $str = $delete['titulo_entrada'];
                            $string = preg_replace('/[0-9\@\(\)\,\-\_\º\&\$\.\;\" "]+/', '', $str);
                                                            
                              ?>                                            
                            <div class="accordion mt-3" id="accordionExample">
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button
                                        type="button"
                                        class="accordion-button collapsed"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#<?php echo $string ?>"
                                        aria-expanded="false"
                                        aria-controls="<?php echo $string ?>"
                                        >
                                        <?php echo $delete['titulo_entrada']." <span class='text-secondary'>&nbsp; &middot; &nbsp;</span> <span class='text-danger'>".$delete['eliminacion_entrada']."</span>" ?>
                                        </button>
                                    </h2>
                                    <div
                                      id="<?php echo $string ?>"
                                      class="accordion-collapse collapse"
                                      aria-labelledby="headingTwo"
                                      data-bs-parent="#accordionExample"
                                    >
                                        <div class="accordion-body">
                                          <?php echo $delete['entrada']?>
                                          <hr>
                                          <span class="card-link">
                                            <i class="bi bi-columns-gap"></i>
                                            <?php echo $delete['categoria_entrada']?>
                                          </span>
                                          <span class="card-link">
                                            <i class="bi bi-chat-square"></i>
                                            <?php echo $delete['comentarios_entrada']?> Comentarios
                                          </span>
                                          <div class="demo-inline-spacing text-end">
                                            <a 
                                              href="../../../controllers/blog/restore_entradaController.php?id_entrada=<?php echo $delete['id_entrada']?>"
                                              type="button" 
                                              class="btn rounded-pill btn-outline-success"
                                              >
                                              <span class="tf-icons bx"><i class="bi bi-check-circle"></i></span> Restaurar
                                            </a>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                              }
                            ?>  
                        </div>
                    </div>
                    <!--/ Accordion -->
                </div>
                <!--/ Order Statistics -->
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
    <div class="buy-now">
      <button href="#modal" class="btn btn-circle btn-primary btn-buy-now rounded-pill"
            type="button"
            class="btn btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#backDropModal">
        <i class="bi bi-pencil-square"></i>
      </button>
      <!-- Modal nueva entrada -->
      <?php 
        require('../../../components/modal_nuevaEntrada.html');
      ?>
      <!-- end modal nueva entrada -->
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
