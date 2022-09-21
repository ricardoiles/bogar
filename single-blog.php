<?php 
    //including the database connection file
include_once("pages/php/sign-in/config.php");

//fetching data in descending order (lastest entry first)
$title = $_GET['id_blog'];

$result = mysqli_query($mysqli, "SELECT * FROM blog WHERE titulo_entrada = '".$title."'");

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

<body class="bg-light">
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
   <section class="blog_area single-post-area section-padding" style="padding-top: 30px !important">
      <div class="container">
         <div class="row">
         <?php
            while($res = mysqli_fetch_array($result)) {	
         ?>  
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="blog_details">
                     <p><a href="blog.php" class="rounded-pill"><i class="bi bi-chevron-left"></i> Volver al blog</a></p>
                     <h2><?php echo $res['titulo_entrada']?></h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a><i class="bi bi-columns-gap"></i> <?php echo $res['categoria_entrada']?> </a></li>
                        <li><a><i class="bi bi-chat-square"></i> <?php echo $res['comentarios_entrada']?> Comentarios</a></li>
                        <li><a><i class="bi bi-calendar-date"></i> <?php echo $res['fecha_entrada']?> </a></li>
                     </ul>
                     <p class="excert">
                        <?php echo $res['entrada']?>
                     </p>
                     <hr>
                  </div>
               </div>
               <div class="comments-area">
                  <h4>Comentarios</h4>
                  <?php 
                     // query comentarios de este blog
                     $comentarios = mysqli_query($mysqli, "SELECT * FROM comentarios_blog WHERE id_entrada = ".$res['id_entrada']." ORDER BY id_comentario DESC");
                  ?>
                  <?php
                     while($coment = mysqli_fetch_array($comentarios)) {	
                  ?> 
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="desc">
                              <p class="comment">
                              <i class="bi bi-chat-square"></i> <?php echo $coment['comentario']?>
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a><i class="bi bi-person"></i> <?php echo $coment['usuario']?></a>
                                    </h5>
                                    <p class="date"><i class="bi bi-calendar-date"></i> <?php echo $coment['fecha']?> </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                  ?> 
               </div>
               <div class="comment-form">
                  <h4>Deja un comentario</h4>
                  <form class="form-contact comment_form" action="controllers/comentarController.php" method="post" id="commentForm">
                     <div class="row">
                        <!-- titulo de la entrada -->
                        <input name="title" type="hidden" value="<?php echo $res['titulo_entrada']?>">
                        <!-- id_entrada -->
                        <input name="id_entrada" type="hidden" value="<?php echo $res['id_entrada']?>">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100 border-secondary" name="comentario" id="comment" cols="30" rows="9"
                                 placeholder="Escribe aquí tu comentario" required></textarea>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control border-secondary" name="usuario" id="name" type="text" placeholder="Escribe tu nombre" required>
                           </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                              <input class="form-control border-secondary" name="email" id="email" type="email" placeholder="Correo electrónico" required>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <input type="submit" name="nuevo_comentario" class="button button-contactForm btn_1 boxed-btn" value="Comentar">
                     </div>
                  </form>
               </div>
            </div>
         <?php
            }
         ?> 
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
   <!--================ Blog Area end =================-->

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