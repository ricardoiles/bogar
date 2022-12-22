<!-- footer start -->
    <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div id="suscribe" class="col-xl-6 col-md-6">
                        <div class="footer_widget">
                            <div class="text text-center">
                                <h3 class="text-white">Contáctame para recibir clases</h3>
                                <a class="boxed-btn3" href="contact.php">Contáctame</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-5 offset-xl-1">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Contáctame
                            </h3>
                            <ul>
                                <?php
                                    //consultar preview info
                                    include('./connection/config.php');
                                    $prev = mysqli_query($mysqli, "SELECT * FROM preview_info");
                                    while($pre = mysqli_fetch_array($prev)) {	
                                ?>
                                <li>
                                    <a href="mailto:<?php echo $pre['correo'];?>
                                    ?subject=Hola desde tu portafolio web&body=Hola César, recibe cordial saludo,
                                    te escribo desde tu portafolio web [...Escribe aquí tu mensaje...]">
                                        <?php echo $pre['correo'];?>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://wa.me/<?php echo $pre['telefono'];?>" target="_blank"><?php echo $pre['telefono'];?></a>
                                </li>
                                <li><?php echo $pre['ubicacion'];?></li>
                                <?php
                                    }
                                ?>
                            </ul>
                            <div class="socail_links">
                                <ul>
                                    <?php
                                      //consultar link facebook
                                      include('./connection/config.php');
                                      $facebook = mysqli_query($mysqli, "SELECT * FROM links_redes WHERE nombre_link = 'facebook'");
                                      while($face = mysqli_fetch_array($facebook)) {	
                                    ?>
                                        <li>
                                            <a href="<?php echo $face['link'];?>" class="bg-primary" target="_blank">
                                                <i class="bi bi-facebook"></i>
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
                                            <a href="https://wa.me/<?php echo $whats['link'];?>" class="bg-success" target="_blank">
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
                                            <a href="<?php echo $you['link'];?>" class="bg-danger" target="_blank">
                                                <i class="bi bi-youtube"></i>
                                            </a>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                      //consultar link tiktok
                                      $tiktok = mysqli_query($mysqli, "SELECT * FROM links_redes WHERE nombre_link = 'tiktok'");
                                      while($tik = mysqli_fetch_array($tiktok)) {	
                                    ?>
                                        <li>
                                            <a href="<?php echo $tik['link'];?>" class="bg-secondary" target="_blank">
                                                <i class="bi bi-tiktok"></i>
                                            </a>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                    <?php
                                      //consultar link twitter
                                      $twitter = mysqli_query($mysqli, "SELECT * FROM links_redes WHERE nombre_link = 'twiter'");
                                      while($twit = mysqli_fetch_array($twitter)) {	
                                    ?>
                                        <li>
                                            <a href="<?php echo $twit['link'];?>" class="bg-primary" target="_blank">
                                                <i class="bi bi-twitter"></i>
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
                                    <?php
                                      //consultar link linktree
                                      $linktree = mysqli_query($mysqli, "SELECT * FROM links_redes WHERE nombre_link = 'linktree'");
                                      while($lt = mysqli_fetch_array($linktree)) {	
                                    ?>
                                        <li>
                                            <a href="<?php echo $lt['link'];?>" class="bg-success" target="_blank">
                                                <img width="13px" src="./img/svg_icon/linktree.svg"> 
                                            </a>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="footer_border"></div>
                <div class="row">
                    <div class="col-xl-7 col-md-6">
                        <p class="copy_right">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            &copy; 2022 todos los derechos reservados | esta plantilla esta hecha por <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <div class="footer_links">
                            <ul>
                                <li class="text-light">Portafolio desarrollado por <a href="https://ricardoiles.github.io/me" target="_blank">Ricardo Iles</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!--/ footer end  -->