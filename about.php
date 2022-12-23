<?php
    require('components/head_portafolio.html');
?>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
        <?php include 'components/navbar.php';?>
    <!-- header-end -->

    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Sobre mí</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->


    <!-- about_area  -->
    <div class="about_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-md-6">
                    <div class="about_thumb">
                    <?php
                        // informacion previa
                        // include('./connection/config.php');
                        $about = mysqli_query($mysqli, "SELECT * FROM sobre_mi WHERE seccion = 'cesar'");
                        while($ab = mysqli_fetch_array($about)) {	
                    ?>
                        <img class="img-fluid" src="http://localhost/bogar_admin/img/upload_images/<?php echo $ab['foto']; ?>" 
                            alt="<?php echo $ab['foto']; ?>">
                    <?php
                        }
                    ?>
                    </div>
                </div>
                <div class="col-xl-7 col-md-6">
                    <div class="about_info text-justify">
                        <h3>¿Quien es César Nuñez?
                            <br>
                            <h5>Músico/baterista interprete con más de 15 años de experiencia.</h5>
                        </h3>
                        <p>
                            <?php
                                // información previa descripción
                                $preview = mysqli_query($mysqli, "SELECT * FROM sobre_mi WHERE seccion = 'cesar'");
                                while($prev = mysqli_fetch_array($preview)) {	
                                    echo $prev['descripcion'];
                                }
                            ?>
                        </p>
                        <div class="signature">
                             <a href="#storytelling" class="btn border-danger rounded-pill">Conoce mi historia <i class="bi bi-arrow-down-short"></i></a> &nbsp;
                             <a href="services.php" class="btn btn-danger rounded-pill">Conoce mis servicios</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ about_area  -->

    <!-- storytelling area  -->
    <div id="storytelling" class="about_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-md-6">
                    <div class="about_info text-center">
                        <h3>Conoce mi historia</h3>
                        <p>
                        <?php
                            // información previa descripción
                            $historia = mysqli_query($mysqli, "SELECT * FROM sobre_mi WHERE seccion = 'historia'");
                            while($his = mysqli_fetch_array($historia)) {	
                                echo $his['descripcion'];
                            }
                        ?>
                        </p>
                        <div class="signature">
                            <a href="#trayectoria" class="btn border-danger rounded-pill">Trayectoria <i class="bi bi-arrow-down-short"></i></a> &nbsp;
                            <a href="contact.php" class="btn btn-danger rounded-pill">Contáctame</a> 
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-md-6">
                    <div class="about_thumb">
                    <?php
                        // informacion previa
                        // include('./connection/config.php');
                        $historia = mysqli_query($mysqli, "SELECT * FROM sobre_mi WHERE seccion = 'historia'");
                        while($his = mysqli_fetch_array($historia)) {	
                    ?>
                        <img class="img-fluid" src="http://localhost/bogar_admin/img/upload_images/<?php echo $his['foto']; ?>" 
                            alt="<?php echo $his['foto']; ?>">
                    <?php
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ storytelling area  -->

    <!-- Experiencia -->
    <div id="trayectoria" class="about_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="container-fluid py-5">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="section_title text-center mb-65">
                                    <h3>Experiencia y Trayectoria</h3>
                                    <h5>Giras dentro de la República Mexicana y el extranjero</h5> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="horizontal-timeline">
                                    <h3 class="mb-30">Experiencia</h3> <br>
                                    <ul class="list-inline items">
                                    <?php
                                        // experiencias 
                                        $experiencia = mysqli_query($mysqli, "SELECT * FROM expe_traye WHERE tipo = 'experiencia' ORDER BY tipo DESC");
                                        while($expe = mysqli_fetch_array($experiencia)) {	
                                    ?>
                                        <li class="list-inline-item items-list">
                                            <div class="px-4">
                                                <div class="event-date badge bg-info"><?php echo $expe['fecha_lugar']; ?></div>
                                                <h5 class="pt-2"><?php echo $expe['titulo']; ?></h5>
                                                <p class="text-muted"><?php echo $expe['descripcion']; ?></p>
                                            </div>
                                        </li>
                                    <?php
                                        }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-top-border">
                                    <h3 class="mb-30">Trayectoria</h3>
                                    <div class="bd-example">
                                        <table class="table table-responsive table-hover">
                                            <thead>
                                            <tr>
                                            <th scope="col"><i class="bi bi-pin-map"></i> Lugar</th>
                                            <th scope="col"><i class="bi bi-signpost"></i> Trayectoria</th>
                                            <th scope="col"><i class="bi bi-list-nested"></i> Descripción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            // experiencias 
                                            $trayectoria = mysqli_query($mysqli, "SELECT * FROM expe_traye WHERE tipo = 'trayectoria' ORDER BY tipo DESC ");
                                            while($traye = mysqli_fetch_array($trayectoria)) {	
                                        ?>
                                            <tr>
                                                <td><?php echo $traye['fecha_lugar']; ?></td>
                                                <td><?php echo $traye['titulo']; ?></td>
                                                <td><?php echo $traye['descripcion']; ?></td>
                                            </tr>
                                        <?php
                                            }
                                        ?>
                                        </tbody>

                                        </table>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Experiencia -->

    <!-- gallery -->
    
    <!--/ gallery -->
        <?php include 'components/gallery.html';?>
    <!-- footer start -->
        <?php include 'components/footer.php';?>
    <!--/ footer end  -->

    <!-- link that opens popup -->

    <!-- JS here -->
    <?php
        require('components/js_portafolio.html');
    ?>
</body>

</html>