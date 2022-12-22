<header>
    <div class="header-area ">
        <div id="sticky-header" class="main-header-area">
            <div class="container-fluid">
                <div class="header_bottom_border">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-2">
                            <div class="logo">
                                <a href="index.php">
                                    <img src="./img/logo_nabvar.png" alt="" width="150px"> 
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7">
                            <div class="main-menu  d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="index.php">Inicio</a></li>
                                        <li><a href="about.php">Sobre mí</a></li>
                                        <li><a href="services.php">Servicios</a></li>
                                        <li><a href="blog.php">Blog</a></li>
                                        <li><a href="contact.php">Contactame</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="social_icon text-right">
                                <ul>
                                    <?php
                                      //consultar link facebook
                                      include('./connection/config.php');
                                      $facebook = mysqli_query($mysqli, "SELECT * FROM links_redes WHERE nombre_link = 'facebook'");
                                      while($face = mysqli_fetch_array($facebook)) {	
                                    ?>
                                        <li>
                                            <a href="<?php echo $face['link'];?>"> 
                                            <i class="bi bi-facebook" target="_blank"></i> 
                                            </a>
                                        </li>
                                    <?php
                                      }
                                    ?>
                                    <?php
                                      //consultar link whatsapp
                                      $whatsapp = mysqli_query($mysqli, "SELECT * FROM links_redes WHERE nombre_link = 'whatsapp'");
                                      while($whats = mysqli_fetch_array($whatsapp)) {	
                                    ?>
                                        <li>
                                            <a href="https://wa.me/<?php echo $whats['link'];?>" target="_blank"> 
                                            <i class="bi bi-whatsapp"></i> 
                                            </a>
                                        </li>
                                    <?php
                                      }
                                    ?>
                                    <?php
                                      //consultar link youtube
                                      $youtube = mysqli_query($mysqli, "SELECT * FROM links_redes WHERE nombre_link = 'youtube'");
                                      while($you = mysqli_fetch_array($youtube)) {	
                                    ?>
                                        <li>
                                            <a href="<?php echo $you['link'];?>" target="_blank"> 
                                            <i class="bi bi-youtube"></i> 
                                            </a>
                                        </li>
                                    <?php
                                      }
                                    ?>
                                    <?php
                                      //consultar link platzi
                                      $platzi = mysqli_query($mysqli, "SELECT * FROM links_redes WHERE nombre_link = 'platzi'");
                                      while($pla = mysqli_fetch_array($platzi)) {	
                                    ?>
                                        <li>
                                            <a href="<?php echo $pla['link'];?>" target="_blank">
                                            <img width="13px" src="./img/svg_icon/platzi.svg">
                                            </a>
                                        </li>
                                    <?php
                                      }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</header>