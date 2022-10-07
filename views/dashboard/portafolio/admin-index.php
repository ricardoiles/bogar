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
                  Administrar página inicio
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
              <!-- index y about -->
              <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4">
                <div class="row">
                  <!-- información de inicio y servicios-->
                    <div class="col-md mb-4 mb-md-0">
                      <!-- Información de inicio -->
                        <h6 class="text-dark fw-semibold">
                          <i class="bi bi-info-circle"></i> &nbsp;
                            Información de inicio
                        </h6>        
                        <!-- Links redes sociales -->
                          <div class="accordion mt-3" id="accordionExample">
                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button
                                type="button"
                                class="accordion-button collapsed"
                                data-bs-toggle="collapse"
                                data-bs-target="#linkredsocial"
                                aria-expanded="false"
                                aria-controls="linkredsocial"
                                >
                                <i class="bi bi-link-45deg"></i> &nbsp;
                                Links redes sociales
                              </h2>
                              <div
                                id="linkredsocial"
                                class="accordion-collapse collapse show"
                                aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                  <form action="../../../controllers/portafolio/update_linksController.php" method="post" name="editar_links_form" class="row g-3">
                                    <?php
                                      //consultar link por red
                                      $links = mysqli_query($mysqli, "SELECT * FROM links_redes");
                                      while($link = mysqli_fetch_array($links)) {	
                                    ?>
                                      <div class="col-md-6">
                                        <label 
                                          for="<?php echo $link['id_link'];?>" 
                                          class="form-label">
                                          <?php echo $link['nombre_link'];?>
                                        </label>
                                        <input 
                                          name="<?php echo $link['nombre_link'];?>"
                                          type="text" 
                                          class="form-control" 
                                          id="<?php echo $link['id_link'];?>" 
                                          value="<?php echo $link['link'];?>"
                                        />
                                      </div>
                                    <?php
                                      }
                                    ?>
                                    <div class="col-12">
                                      <div class="d-grid gap-2">
                                      <input type="submit" name="updatelinks" class="btn btn-primary" value="Guardar"/>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- / Links redes sociales  -->
                        <!-- Información previa y datos de contacto -->
                          <div class="accordion mt-3" id="accordionExample">
                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button
                                type="button"
                                class="accordion-button collapsed"
                                data-bs-toggle="collapse"
                                data-bs-target="#previewinfo"
                                aria-expanded="false"
                                aria-controls="previewinfo"
                                >
                                <i class="bi bi-file-earmark-person"></i> &nbsp;
                                Información previa y datos de contacto
                              </h2>
                              <div
                                id="previewinfo"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                  <form class="row g-3">
                                    <div class="col-md-12">
                                      <label for="inputEmail4" class="form-label">Descripción breve sobre mí</label>
                                      <textarea type="text" class="form-control" id="inputEmail4" value=""  maxlength="500" placeholder="Máximo 500 caracteres"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                      <label for="inputCity" class="form-label">Foto</label>
                                      <input type="file" class="form-control" id="inputCity">
                                      <div id="emailHelp" class="form-text">La foto cargada actualmente es: <a href="">Link de la foto</a></div>
                                    </div>
                                    <div class="col-md-6">
                                      <label for="inputCity" class="form-label">Correo</label>
                                      <input type="text" class="form-control" id="inputCity">
                                      <div id="emailHelp" class="form-text"></div>
                                    </div>
                                    <div class="col-md-6">
                                      <label for="inputCity" class="form-label">Teléfono</label>
                                      <input type="text" class="form-control" id="inputCity" placeholder="Ej: +52 123231123">
                                      <div id="emailHelp" class="form-text"></div>
                                    </div>
                                    <div class="col-md-6">
                                      <label for="inputCity" class="form-label">Ubicación</label>
                                      <input type="text" class="form-control" id="inputCity" placeholder="Ej: Lomas de Tarango, México">
                                      <div id="emailHelp" class="form-text"></div>
                                    </div>
                                    <div class="col-12">
                                      <div class="d-grid gap-2">
                                      <input type="submit" class="btn btn-primary" value="Guardar"/>
                                      </div>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- / Información previa y datos de contacto -->
                      <!-- / Información de inicio -->

                      <!-- Mis servicios  -->
                        <p>
                          <h6 class="text-dark fw-semibold">
                            <i class="bi bi-bezier"></i> &nbsp;
                              Mis servicios
                          </h6>
                        </p>
                        <!-- servicios accordion -->
                            <div class="accordion mt-3" id="accordionExample">
                              <div class="card accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                  <button
                                  type="button"
                                  class="accordion-button collapsed"
                                  data-bs-toggle="collapse"
                                  data-bs-target="#servicios"
                                  aria-expanded="false"
                                  aria-controls="servicios"
                                  >
                                  <i class="bi bi-view-list"></i> &nbsp;
                                  Servicios
                                </h2>
                                <div
                                  id="servicios"
                                  class="accordion-collapse collapse"
                                  aria-labelledby="headingTwo"
                                  data-bs-parent="#accordionExample"
                                  >
                                  <div class="accordion-body">
                                    <!-- Servicio -->
                                      <div class="d-flex mb-3">
                                        <div class="flex-shrink-0">
                                          <!-- dropdown edit -->
                                          <div class="btn-group dropend">
                                            <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <ul class="dropdown-menu" style="">
                                              <li><a class="dropdown-item" href="" 
                                                    data-bs-toggle="modal" data-bs-target="#editarServicio">
                                                <i class="bi bi-pencil text-primary"></i>
                                                Editar
                                              </a></li>
                                              <li><a class="dropdown-item text-warning" href="javascript:void(0);">
                                                <i class="bi bi-trash3 text-danger"></i>
                                                Eliminar 
                                                <i class="bi bi-exclamation-triangle-fill"></i>
                                              </a></li>
                                            </ul>
                                            <?php 
                                                require('../../../components/modal_editarServicio.html');
                                              ?> 
                                          </div> &nbsp;
                                          <!-- / dropdown edit -->
                                        </div>
                                        <div class="flex-grow-1 row">
                                          <div class="col-9 col-sm-8 mb-sm-0 mb-2">
                                            <h6 class="mb-0">Titulo servicio</h6>
                                            <small class="text-muted">Servicio que ofrece Servicio que ofrece Servicio que ofrece Servicio que ofrece </small>
                                          </div>
                                          <div class="col-3 col-sm-4 text-end">
                                            <span class="badge rounded-pill bg-primary">Servicio</span>
                                          </div>
                                        </div>
                                      </div>
                                    <!-- /Servicio -->
                                    <hr>
                                    <div class="demo-inline-spacing text-end">
                                    <a 
                                      href="edit_entrada.php?id_entrada="
                                      type="button" 
                                      class="btn rounded-pill btn-outline-primary"
                                      data-bs-toggle="modal" data-bs-target="#nuevoServicio"
                                      >
                                      Añadir <span class=""><i class="bi bi-plus-lg"></i></span>
                                    </a>
                                  </div>
                                  <?php 
                                    require('../../../components/modal_nuevoServicio.html');
                                  ?>  
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- / servicios accordion  -->
                        <!-- clases accordion -->
                          <div class="accordion mt-3" id="accordionExample">
                            <div class="card accordion-item">
                              <h2 class="accordion-header" id="headingTwo">
                                <button
                                type="button"
                                class="accordion-button collapsed"
                                data-bs-toggle="collapse"
                                data-bs-target="#clases"
                                aria-expanded="false"
                                aria-controls="clases"
                                >
                                <i class="bi bi-card-list"></i> &nbsp;
                                Clases
                              </h2>
                              <div
                                id="clases"
                                class="accordion-collapse collapse"
                                aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample"
                                >
                                <div class="accordion-body">
                                  <!-- Clase -->
                                    <div class="d-flex mb-3">
                                      <div class="flex-shrink-0">
                                        <!-- dropdown edit -->
                                        <div class="btn-group dropend">
                                          <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                          </button>
                                          <ul class="dropdown-menu" style="">
                                            <li><a class="dropdown-item" href="" 
                                                  data-bs-toggle="modal" data-bs-target="#editarClase">
                                              <i class="bi bi-pencil text-primary"></i>
                                              Editar
                                            </a></li>
                                            <li><a class="dropdown-item text-warning" href="javascript:void(0);">
                                              <i class="bi bi-trash3 text-danger"></i>
                                              Eliminar 
                                              <i class="bi bi-exclamation-triangle-fill"></i>
                                            </a></li>
                                          </ul>
                                          <?php 
                                              require('../../../components/modal_editarClase.html');
                                            ?> 
                                        </div> &nbsp;
                                        <!-- / dropdown edit -->
                                      </div>
                                      <div class="flex-grow-1 row">
                                        <div class="col-9 col-sm-8 mb-sm-0 mb-2">
                                          <h6 class="mb-0">Titulo Clase</h6>
                                          <small class="text-muted">Servicio que ofrece Servicio que ofrece Servicio que ofrece Servicio que ofrece </small>
                                        </div>
                                        <div class="col-3 col-sm-4 text-end">
                                          <span class="badge rounded-pill bg-success">Clase</span>
                                        </div>
                                      </div>
                                    </div>
                                  <!-- /Clase -->
                                  <hr>
                                  <div class="demo-inline-spacing text-end">
                                    <a 
                                      href="edit_entrada.php?id_entrada="
                                      type="button" 
                                      class="btn rounded-pill btn-outline-primary"
                                      data-bs-toggle="modal" data-bs-target="#nuevaClase"
                                      >
                                      Añadir <span class=""><i class="bi bi-plus-lg"></i></span>
                                    </a>
                                  </div>
                                  <?php 
                                    require('../../../components/modal_nuevaClase.html');
                                  ?>  
                                </div>
                              </div>
                            </div>
                          </div>
                        <!-- / clases accordion  -->
                      <!-- / Mis servicios -->
                    </div>
                  <!-- / información de inicio y servicios -->
                  
                  <!-- información sobre mi -->
                    <div class="col-md mb-4 mb-md-0">
                      <h6 class="text-dark fw-semibold">
                        <i class="bi bi-person-circle"></i> &nbsp;
                        Información sobre mi
                      </h6>
                      <!-- Quien es cesar -->
                        <div class="accordion mt-3" id="accordionExample">
                          <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#cesar"
                              aria-expanded="false"
                              aria-controls="cesar"
                              >
                              <i class="bi bi-patch-question"></i> &nbsp;
                              ¿Quien es César?
                            </h2>
                            <div
                              id="cesar"
                              class="accordion-collapse collapse"
                              aria-labelledby="headingTwo"
                              data-bs-parent="#accordionExample"
                              >
                              <div class="accordion-body">
                                <form class="row g-3">
                                  <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Descripción sobre mí</label>
                                    <textarea type="text" class="form-control" id="inputEmail4" value="" rows="4"  maxlength="2000"></textarea>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="inputCity" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="inputCity">
                                    <div id="emailHelp" class="form-text">La foto cargada actualmente es: <a href="">Link de la foto</a></div>
                                  </div>
                                  <div class="col-12">
                                    <div class="d-grid gap-2">
                                    <input type="submit" class="btn btn-primary" value="Guardar"/>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      <!-- / Quien es cesar -->
                      <!-- Conoce mi historia -->
                        <div class="accordion mt-3" id="accordionExample">
                          <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#storytelling"
                              aria-expanded="false"
                              aria-controls="storytelling"
                              >
                              <i class="bi bi-book"></i> &nbsp;
                              Conoce mi historia
                            </h2>
                            <div
                              id="storytelling"
                              class="accordion-collapse collapse"
                              aria-labelledby="headingTwo"
                              data-bs-parent="#accordionExample"
                              >
                              <div class="accordion-body">
                                <form class="row g-3">
                                  <div class="col-md-12">
                                    <label for="inputEmail4" class="form-label">Storytelling (<i>Cuenta tu historia</i>)</label>
                                    <textarea type="text" class="form-control" id="inputEmail4" value="" rows="4"  maxlength="2000" placeholder="Cuenta tu historia"></textarea>
                                  </div>
                                  <div class="col-md-12">
                                    <label for="inputCity" class="form-label">Foto</label>
                                    <input type="file" class="form-control" id="inputCity">
                                    <div id="emailHelp" class="form-text">La foto cargada actualmente es: <a href="">Link de la foto</a></div>
                                  </div>
                                  <div class="col-12">
                                    <div class="d-grid gap-2">
                                    <input type="submit" class="btn btn-primary" value="Guardar"/>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      <!-- / Conoce mi historia -->
                      <!-- Experiencia -->
                        <div class="accordion mt-3" id="accordionExample">
                          <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#experiencia"
                              aria-expanded="false"
                              aria-controls="experiencia"
                              >
                              <i class="bi bi-bar-chart-steps"></i> &nbsp;
                              Experiencia
                            </h2>
                            <div
                              id="experiencia"
                              class="accordion-collapse collapse"
                              aria-labelledby="headingTwo"
                              data-bs-parent="#accordionExample"
                              >
                              <div class="accordion-body">
                                <ul class="p-0 m-0">
                                  <li class="d-flex mb-4 pb-1">
                                    <div class="dropdown">
                                      <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                        <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modalEditar">
                                          <i class="bi bi-pencil text-primary"></i>
                                          Editar
                                        </a>
                                        <a class="dropdown-item text-warning" href="javascript:void(0);">
                                          <i class="bi bi-trash3 text-danger"></i>
                                          Eliminar 
                                          <i class="bi bi-exclamation-triangle-fill"></i>
                                        </a>
                                      </div>
                                      <?php 
                                        require('../../../components/modal_editarExperiencia.html');
                                      ?> 
                                    </div> &nbsp;
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                      <div class="me-2 w-75">
                                        <h6 class="d-block mb-1">Nombre experiencia</h6>
                                        <span class="text-muted mb-0">Descripción de la experiencia máximo 200 o mas para probar caracteres</span>
                                      </div>
                                      <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0"><i class="bi bi-calendar-event"></i> 2 Oct</h6>
                                      </div>
                                    </div>
                                  </li>
                                </ul>
                                <hr>
                                <div class="demo-inline-spacing text-end">
                                  <a 
                                    href="edit_entrada.php?id_entrada="
                                    type="button" 
                                    class="btn rounded-pill btn-outline-primary"
                                    data-bs-toggle="modal" data-bs-target="#backDropModal"
                                    >
                                    Añadir <span class=""><i class="bi bi-plus-lg"></i></span>
                                  </a>
                                </div>
                                <?php 
                                  require('../../../components/modal_nuevaExperiencia.html');
                                ?>  
                              </div>
                            </div>
                          </div>
                        </div>
                      <!-- / Experiencia -->
                      <!-- Trayectoria -->
                        <div class="accordion mt-3" id="accordionExample">
                          <div class="card accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                              <button
                              type="button"
                              class="accordion-button collapsed"
                              data-bs-toggle="collapse"
                              data-bs-target="#trayectoria"
                              aria-expanded="false"
                              aria-controls="trayectoria"
                              >
                              <i class="bi bi-hdd-network"></i> &nbsp;
                              Trayectoria
                            </h2>
                            <div
                              id="trayectoria"
                              class="accordion-collapse collapse"
                              aria-labelledby="headingTwo"
                              data-bs-parent="#accordionExample"
                              >
                              <div class="accordion-body">
                                <ul class="p-0 m-0">
                                  <li class="d-flex mb-4 pb-1">
                                    <div class="dropdown">
                                      <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                      </button>
                                      <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                                        <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#modalEditarTrayectoria">
                                          <i class="bi bi-pencil text-primary"></i>
                                          Editar
                                        </a>
                                        <a class="dropdown-item text-warning" href="javascript:void(0);">
                                          <i class="bi bi-trash3 text-danger"></i>
                                          Eliminar 
                                          <i class="bi bi-exclamation-triangle-fill"></i>
                                        </a>
                                      </div>
                                      <?php 
                                        require('../../../components/modal_editarTrayectoria.html');
                                      ?> 
                                    </div> &nbsp;
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                      <div class="me-2 w-50">
                                        <h6 class="d-block mb-1">Tipo Trayectoria</h6>
                                        <span class="text-muted mb-0">Descripción de la experiencia máximo 200 o mas caracteres</span>
                                      </div>
                                      <div class="user-progress d-flex align-items-center gap-1">
                                        <h6 class="mb-0">
                                          <i class="bi bi-geo-alt"></i>
                                          Ciudad de México
                                        </h6>
                                      </div>
                                    </div>
                                  </li>
                                </ul>
                                <hr>
                                <div class="demo-inline-spacing text-end">
                                  <a 
                                    href="edit_entrada.php?id_entrada="
                                    type="button" 
                                    class="btn rounded-pill btn-outline-primary"
                                    data-bs-toggle="modal" data-bs-target="#nuevaTrayectoria"
                                    >
                                    Añadir <span class=""><i class="bi bi-plus-lg"></i></span>
                                  </a>
                                </div>
                                <?php 
                                  require('../../../components/modal_nuevaTrayectoria.html');
                                ?>  
                              </div>
                            </div>
                          </div>
                        </div>
                      <!-- / Trayectoria -->
                    </div>
                  <!-- / información sobre mi -->
                </div>
              </div>
              <!--/ index y about -->
              
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
    
      <?php 
        require('../../../components/js_dashboard.html');
      ?>
  </body>
</html>
