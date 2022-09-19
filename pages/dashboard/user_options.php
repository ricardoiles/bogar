<ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar">
          <img src="https://cdn.w600.comps.canstockphoto.com/musician-playing-drums-and-singing-eps-vector_csp70068246.jpg" alt class="w-px-40 h-auto rounded-circle" />
          </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                    <div class="avatar">
                    <img src="https://cdn.w600.comps.canstockphoto.com/musician-playing-drums-and-singing-eps-vector_csp70068246.jpg" alt class="w-px-40 h-auto rounded-circle" />
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
            <a class="dropdown-item" href="http://localhost/bogar/pages/php/sign-in/logout.php">
                <i class="bx bx-power-off me-2"></i>
                <span class="align-middle">Cerrar sesión</span>
            </a>
          </li>
      </ul>
    </li>
    <!--/ User -->
</ul>