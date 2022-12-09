<?php session_start(); ?>

<?php
  if(isset($_SESSION['valid'])) {				
    include('../../../connection/config.php');			
    $result = mysqli_query($mysqli, "SELECT * FROM user");
  }
?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: ../../../connection/config.php');
}
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
                  Dashboard de contactos
              </div>
              <!-- /Search -->

              <!-- user options -->
              <?php include('../../../components/userDropdown_dashboard.php'); ?>
              <!-- end user options -->
              </div>
          </nav>
          <!-- / Navbar -->            
        <!-- Content wrapper -->
        <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible" role="alert">
            <?= $_SESSION['message']?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <div class="content-wrapper">

        <!-- Content -->
        
          <div class="container-xxl flex-grow-1 container-p-y">         
            <div class="card mb-4">
              <h5 class="card-header">Lista de contactos</h5>
              <div class="card-body">
                <div class="row">
                  <!-- Basic List group -->
                  <div class="col-lg-12 mb-4 mb-xl-0">
                    <small class="text-dark">Esta el información obtenida mediante el formulario de contacto.</small>
                    <div class="demo-inline-spacing mt-3">
                      <div class="list-group">
                        <?php
                          //consultar link por red
                          $contactos = mysqli_query($mysqli, "SELECT * FROM contacto");
                          while($cont = mysqli_fetch_array($contactos)) {	
                        ?>
                        <div class="card accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" 
                              data-bs-target="#accordion<?php echo $cont['id_contacto'];?>" aria-expanded="false" aria-controls="accordion<?php echo $cont['id_contacto'];?>">
                              <?php echo $cont['titulo']." <br> ";?>
                            </button>
                          </h2>
                          <div id="accordion<?php echo $cont['id_contacto'];?>" class="accordion-collapse collapse" aria-labelledby="headingTwo" 
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                              <?php echo $cont['nombres']." &middot; <a href='mailto:"
                                  .$cont['email']."' class='text-danger' target='_blank'>"
                                .$cont['email']."</a> &middot; <a href='https://wa.me/"
                                  .$cont['whatsapp']."' class='text-success' target='_blank'>"
                                .$cont['whatsapp']."</a> <br>";?>
                              <?php echo $cont['created_at'];?>
                              <p><?php echo $cont['mensaje'];?> </p>
                            </div>
                          </div>
                        </div>
                        <br>
                        <?php
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                  <!--/ Basic List group -->
                </div>
              </div>
            </div>            
          </div>
          <!-- / Content -->
        <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
              <div class="mb-2 mb-md-0">
                ©
                2022
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
    
      <?php 
        require('../../../components/js_dashboard.html');
      ?>
  </body>
</html>
