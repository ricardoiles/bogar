<?php 
    //including the database connection file
include_once("pages/php/sign-in/config.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM blog WHERE estado_entrada = 1 ORDER BY creacion_entrada desc");
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>César Nuñez | Músico</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image" href="img/svg_icon/logocesarnuñez.svg">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/audioplayer.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customstyles.css">
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

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
                        <h3>blog</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->


    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    <?php
                    while($res = mysqli_fetch_array($result)) {	
                        ?>   
                        <article class="blog_item bogar-article-card">
                            <div class="blog_item_img">
                                <a href="#" class="blog_item_date">
                                    <h3>
                                        <?php 
                                            $val = explode(" ", $res['fecha_entrada']);
                                            echo $val[0];
                                        ?>
                                    </h3>
                                    <p>
                                        <?php 
                                            $val = explode(" ", $res['fecha_entrada']);
                                            echo $val[1];
                                        ?>
                                    </p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.php?id_blog=<?php echo $res['titulo_entrada']?>">
                                    <h2><?php echo $res['titulo_entrada']?></h2>
                                </a>
                                <p><?php echo $res['entrada']?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="bi bi-columns-gap"></i> <?php echo $res['categoria_entrada']?></a></li>
                                    <li><a href="#"><i class="bi bi-chat-square"></i> <?php echo $res['comentarios_entrada']?> comentarios</a></li>
                                </ul>
                            </div>
                        </article>
                        <br>
                    <?php
                        }
                    ?>  
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">
                                Suscribete <br>
                                <small style="font-size: 13px; ">Recibe entradas nuevas en tu email</small>
                            </h4>
                            

                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder='Escribe aquí tu correo electrónico' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Suscribirme</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!-- footer start -->
        <?php include 'components/footer.php';?>
    <!--/ footer end  -->
    <!-- JS here -->
    <script src="js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/scrollIt.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="js/contact.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/mail-script.js"></script>

    <script src="js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
    </script>
</body>
</html>