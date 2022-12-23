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
                        <h3>Mis servicios</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
    <!-- music_area  -->
    <div class="music_area music_gallery ">
        <div class="container" style="margin-top:-100px">
            <div class="container mb-3">
                <!-- service section -->
                <hr>
                <p><h3>Servicios</h3></p>
                <div class="row">
                    <?php
                        // experiencias 
                        $servicio = mysqli_query($mysqli, "SELECT * FROM servicios WHERE tipo = 'servicio' ORDER BY update_at DESC ");
                        while($ser = mysqli_fetch_array($servicio)) {	
                    ?>
                        <div class="col-md-4">
                            <div class="card p-3 mb-2">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="ms-2 c-details">
                                            <h4 class="mb-0"><b class="bogar-negrita"><?php echo $ser['titulo']; ?></b></h4>
                                        </div>
                                    </div>
                                    <div class="badge bg-primary"> <span>Servicio</span> </div>
                                </div>
                                <div class="bogar-card-body">
                                    <h5 class="">
                                        <ul>
                                            <?php echo $ser['descripcion']; ?>
                                        </ul>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="d-flex justify-content-center">
                    <a class="btn btn-danger rounded-pill" href="#suscribe">Obtén mis servicios</a>
                </div>
                <!-- end service section -->
                <!-- clase section -->
                <hr>
                <p><h3>Clases</h3></p>
                <div class="row">
                    <?php
                        // experiencias 
                        $servicio = mysqli_query($mysqli, "SELECT * FROM servicios WHERE tipo = 'clase' ORDER BY update_at DESC ");
                        while($ser = mysqli_fetch_array($servicio)) {	
                    ?>
                        <div class="col-md-4">
                            <div class="card p-3 mb-2">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="ms-2 c-details">
                                            <h4 class="mb-0"><b class="bogar-negrita"><?php echo $ser['titulo']; ?></b></h4>
                                        </div>
                                    </div>
                                    <div class="badge bg-success"> <span>Clase</span> </div>
                                </div>
                                <div class="bogar-card-body">
                                    <h5 class="">
                                        <ul>
                                            <?php echo $ser['descripcion']; ?>
                                        </ul>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                
                <!-- end clase section -->
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn btn-danger rounded-pill" href="contact.php">Accede a mis clases</a>
            </div>
        </div>
    </div>
    <!-- music_area end  -->

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