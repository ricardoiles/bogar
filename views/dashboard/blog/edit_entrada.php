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
            <div class="container-xxl flex-grow-1" >
              <!-- tabs -->
              <div class="m-4">
                <ul class="nav nav-tabs" id="myTab">
                    <li class="nav-item">
                        <a href="#detalles" class="nav-link active" data-bs-toggle="tab"  onclick="edit('cardform')">
                          <i class="bi bi-pencil"></i>
                          Editar entrada 
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#eliminar" class="nav-link" data-bs-toggle="tab" onclick="eliminar('comentarios')">
                          <i class="bi bi-trash3"></i>
                          Eliminar comentarios
                          <i class="bi bi-exclamation-triangle-fill text-warning"></i>
                        </a>
                    </li>
                </ul>
                <?php if (isset($_SESSION['message'])) { ?>
                  <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                <?php } ?>
                
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="detalles" style="background-color: inherit;">
                        <div id="cardform" class="">
                          <?php
                              while($res = mysqli_fetch_array($result)) {	
                          ?>
                          
                          <!-- Editar entrada form -->
                              <div class="card mb-4">
                                  <div class="card-body">
                                      <form action="../../../controllers/blog/update_entradaController.php" method="post" name="editar_entrada_form">
                                      <input name="id_entrada" type="hidden" value="<?php echo $res['id_entrada'];?>">
                                          <div class="mb-3">
                                              <label class="form-label" for="basic-default-fullname">Fecha entrada</label>
                                              <input name="input_fecha" type="datetime" class="form-control" id="basic-default-fullname" placeholder="Ej: 25 Sept 2022" value="<?php echo $res['fecha_entrada'];?>">
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
                                            <textarea name="input_entrada" id="basic-default-message" class="form-control" value="<?php echo $res['entrada'];?>">
                                              <?php echo $res['entrada'];?>
                                            </textarea>
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
                    </div>
                    <div class="" id="eliminar">
                    
                      <div id="comentarios" style="display:none">
                        <ol class="list-group ">
                        <?php
                          //including the database connection file
                          include_once("../../../connection/config.php");
                          $id = $_GET['id_entrada'];
                          $result = mysqli_query($mysqli, "SELECT * FROM comentarios_blog where id_entrada =".$_GET['id_entrada']);
                          while($res = mysqli_fetch_array($result)) {	
                        ?>
                        
                          <li class="list-group-item d-flex justify-content-between align-items-start bg-white">
                            <div class="ms-2 me-auto">
                              <div>
                                <i class="bi bi-person"></i>
                                <span class="fw-bold"><?php echo $res['usuario']?></span> &middot; <?php echo "<a href='mailto:".$res['email']."' target='_blank'>".$res['email']."</a>"?>
                              </div>
                              <i class="bi bi-chat-square"></i>
                              <?php echo $res['comentario'];?>
                              <br>
                              <i class="bi bi-calendar-date"></i>
                              <?php echo $res['fecha'];?>
                            </div>
                            <a href="../../../controllers/blog/delete_comentController.php?id_entrada=<?php echo $res['id_entrada']?>&id_comentario=<?php echo $res['id_comentario']?>" class="badge bg-danger rounded-pill text-white">
                              <i class="bi bi-trash3"></i>
                            </a>
                          </li>
                          <div class="d-flex justify-content-center"><hr width="90%px"></div>
                          <?php
                        }
                        ?>
                        </ol>
                        
                      </div>
                    </div>
                </div>
                <!-- toast warning -->
                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                  <div id="liveToast" class="toast fade" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                      <i class="bd-placeholder-img rounded me-2 bi bi-exclamation-triangle-fill text-warning" width="20" height="20" aria-hidden="true" focusable="false"></i>
                      <strong class="me-auto">Advertencia</strong>
                      <small>
                        <?php 
                          $fecha = new DateTime('', new DateTimeZone('America/Mexico_City'));
                          echo $fecha->format('h:i A');
                        ?>
                        </small>
                      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body " style="padding-top: 0px">
                      Elimina un comentario siempre y cuando estés seguro, ya que <b>no se podrán recuperar</b>.
                    </div>
                  </div>
                </div>
                <!-- / toast warning -->
              <!-- / tabs -->

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
