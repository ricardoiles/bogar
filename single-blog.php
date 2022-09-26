<?php 
    //including the database connection file
include_once("connection/config.php");

//fetching data in descending order (lastest entry first)
$id = $_GET['id_blog'];

$result = mysqli_query($mysqli, "SELECT * FROM blog WHERE id_entrada = '".$id."'");

?>

<?php
    require('components/head_portafolio.html');
?>

<body class="bg-light">
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
        <?php include 'components/navbar.php';?>
    <!-- header-end -->
      <?php
         while($res = mysqli_fetch_array($result)) {	
      ?> 
    <!-- bradcam_area  -->
    <div class="bradcam_area breadcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h4 class="text-white">Blog</h4>
                        <h1 class="text-white"><?php echo $res['titulo_entrada']?></h1>
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
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="blog_details card bg-white" style="padding: 20px">
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
                     <div class="single-comment justify-content-between d-flex card bg-white" style="padding: 20px">
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
                  <form class="form-contact comment_form" action="controllers/blog/comentar_entradaController.php" method="post" id="commentForm">
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
               
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

    <!-- footer start -->
        <?php include 'components/footer.php';?>
    <!--/ footer end  -->
    <!-- JS here -->
    <?php
        require('components/js_portafolio.html');
    ?>
</body>
</html>