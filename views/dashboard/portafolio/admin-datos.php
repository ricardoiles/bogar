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
                    Editar datos de usuario
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
            <?php if (isset($_SESSION['message'])) { ?>
              <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            <?php } ?>
                <!-- Basic Layout -->
                <div class="row">
                    <div class="col-7">
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Datos de usuario</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                    //consultar link por red
                                    $datos = mysqli_query($mysqli, "SELECT * FROM user");
                                    while($dato = mysqli_fetch_array($datos)) {	
                                ?>
                                <form action="../../../controllers/portafolio/update_previewInfoController.php" 
                                class="row g-3" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_user" value="<?php echo $dato['id_user'];?>">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Nombre</label>
                                        <input type="text" name="name" class="form-control" id="basic-default-fullname" 
                                            placeholder="Nombres" value="<?php echo $dato['name'];?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Apellido</label>
                                        <input type="text" name="lastname" class="form-control" id="basic-default-company" 
                                            placeholder="Apellidos" value="<?php echo $dato['lastname'];?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-email">Nombre de usuario</label>
                                        <div class="input-group input-group-merge">
                                        <input type="text" name="username" id="basic-default-email" class="form-control"
                                            value="<?php echo $dato['username'];?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-email">Contraseña</label>
                                        <div class="input-group input-group-merge">
                                        <input type="text" name="password" id="basic-default-email" class="form-control"
                                            value="<?php echo $dato['password'];?>" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-phone">Pin de recuperación</label>
                                        <input type="text" name="pin" id="basic-default-phone" class="form-control phone-mask" 
                                            placeholder="123456" maxlength="6" value="<?php echo $dato['pin'];?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-message">Logo / avatar</label>
                                        <input type="file" class="form-control" id="inputCity" 
                                            value="../../../img/upload_images/<?php echo $dato['logo']; ?>"              
                                            name="logo" accept="image/*" required>
                                        <div id="emailHelp" class="form-text">La foto cargada actualmente es: 
                                            <a href="../../../img/upload_images/<?php echo $dato['logo']; ?>" target="_blank">
                                            <?php echo $dato['logo']; ?></a>
                                        </div>
                                    </div>
                                    <input type="submit" value="Actualizar" name="editar_datos" class="btn btn-primary">
                                </form>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Content -->
            <div class="content-backdrop fade"></div>
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

      <script>
        function edit(i) {
            document.getElementById(i).style.display = 'block';
            document.getElementById('comentarios').style.display = 'none';
            // quitar toast de alerta 
            var toast = document.getElementById("liveToast");
            toast.classList.remove('show');
        }
        function eliminar(i) {
            document.getElementById(i).style.display = 'block';
            document.getElementById('cardform').style.display = 'none';
            console.log('aqui voy');
            // mostrar toast de alerta si va a eliminar mensajes
            var toast = document.getElementById("liveToast");
            toast.className += " show";
        }
      </script>
  </body>
</html>
