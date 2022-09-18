<?php session_start(); ?>

<?php
  if(isset($_SESSION['valid'])) {				
    include('../../php/sign-in/config.php');			
    $result = mysqli_query($mysqli, "SELECT * FROM user");
  }
?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: ../../sign-in.php');
}
?>

<?php
//including the database connection file
include_once("../../php/sign-in/config.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM blog WHERE estado_entrada = 1 ORDER BY creacion_entrada desc");

// query entradas eliminadas
$delete_query = mysqli_query($mysqli, "SELECT * FROM blog WHERE estado_entrada = 0 ORDER BY creacion_entrada desc");
?>
<!DOCTYPE html>
<html
  lang="en"
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
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?php include("../sidenav.html")?>
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

                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="avatar">
                        <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">
                                  <?php echo $_SESSION['valid'] ?>
                                </span>
                                <small class="text-muted">Admin</small>
                            </div>
                            </div>
                        </a>
                        </li>
                        <li>
                        <div class="dropdown-divider"></div>
                        </li>
                        <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Editar mis datos</span>
                        </a>
                        </li>
                        <li>
                        <div class="dropdown-divider"></div>
                        </li>
                        <li>
                        <a class="dropdown-item" href="../../php/sign-in/logout.php">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Cerrar sesión</span>
                        </a>
                        </li>
                    </ul>
                    </li>
                    <!--/ User -->
                </ul>
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
                              ?>                                            
                          <div class="accordion mt-3" id="accordionExample">
                              <div class="card accordion-item">
                                  <h2 class="accordion-header" id="headingTwo">
                                      <button
                                      type="button"
                                      class="accordion-button collapsed"
                                      data-bs-toggle="collapse"
                                      data-bs-target="#<?php echo str_replace(' ', '', $res['titulo_entrada']) ?>"
                                      aria-expanded="false"
                                      aria-controls="<?php echo str_replace(' ', '', $res['titulo_entrada']) ?>"
                                      >
                                      <?php echo $res['titulo_entrada']." del ".$res['fecha_entrada'] ?>
                                      </button>
                                  </h2>
                                  <div
                                    id="<?php echo str_replace(' ', '', $res['titulo_entrada']) ?>"
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
                                            href="editar_entrada.php?id_entrada=<?php echo $res['id_entrada']?>"
                                            type="button" 
                                            class="btn rounded-pill btn-icon btn-outline-primary"
                                            >
                                            <span class="tf-icons bx"><i class="bi bi-pencil"></i></span>
                                          </a>
                                          <button type="button" class="btn rounded-pill btn-icon btn-outline-secondary">
                                            <span class="tf-icons bx "><i class="bi bi-eye"></i></span>
                                          </button>
                                          <a
                                            href="delete_controller.php?id_entrada=<?php echo $res['id_entrada']?>"
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
                              ?>                                            
                            <div class="accordion mt-3" id="accordionExample">
                                <div class="card accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button
                                        type="button"
                                        class="accordion-button collapsed"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#<?php echo str_replace(' ', '', $delete['titulo_entrada']) ?>"
                                        aria-expanded="false"
                                        aria-controls="<?php echo str_replace(' ', '', $delete['titulo_entrada']) ?>"
                                        >
                                        <?php echo $delete['titulo_entrada']." del ".$delete['fecha_entrada'] ?>
                                        </button>
                                    </h2>
                                    <div
                                      id="<?php echo str_replace(' ', '', $delete['titulo_entrada']) ?>"
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
                                              href="restore_controller.php?id_entrada=<?php echo $delete['id_entrada']?>"
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
      <!-- Modal -->
      <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" name="form-nueva-entrada" action="nueva_entrada.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="backDropModalTitle">Añadir nueva entrada al blog</h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <div class="row g-2">
                      <div class="col mb-0">
                        <label for="input_fecha" class="form-label">Fecha</label>
                        <input
                            name="input_fecha"
                            type="text"
                            id="input_fecha"
                            class="form-control"
                            placeholder="ej: 15 Sept 2022"
                            required
                        />
                      </div>
                      <div class="col mb-0">
                        <label for="input_categoria" class="form-label">Categoría</label>
                        <input 
                            name="input_categoria"
                            type="text"
                            id="input_categoria"
                            class="form-control"
                            placeholder="Máximo 30 letras"
                            maxlength="30"
                            required
                        />
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col mb-0">
                        <label for="input_titulo" class="form-label">Titulo</label>
                        <input 
                            name="input_titulo"
                            type="text"
                            id="input_titulo"
                            class="form-control"
                            placeholder="Máximo 50 letras"
                            maxlength="50"
                            required
                        />
                      </div> 
                    </div>
                    <div class="row">
                        <div class="col mb-0">
                        <label for="input_entrada" class="form-label">Entrada</label>
                        <textarea 
                            name="input_entrada" 
                            class="form-control" 
                            id="input_entrada" 
                            rows="3"
                            required
                            >
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <input 
                      type="submit" 
                      name="nueva_entrada" 
                      class="btn btn-primary"
                      value="Guardar"
                      />
                </div>
            </form>
        </div>
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
