<?php 
    //including the database connection file
include_once("connection/config.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM blog WHERE estado_entrada = 1 ORDER BY fecha_entrada desc");
?>

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
                                <a href="#" class="blog_item_date bg-danger">
                                    <h3>
                                        <?php 
                                            $date = $date = $res['creacion_entrada'];;
                                            // $date = explode(" ", $date);
                                            echo $date[0];
                                            echo $date[1];
                                        ?>
                                    </h3>
                                    <p>
                                        <?php 
                                           $date = $res['creacion_entrada'];
                                           echo substr(ucwords($date), 2, 10);
                                        ?>
                                    </p>
                                </a>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.php?id_blog=<?php echo $res['id_entrada']?>">
                                    <h2><?php echo $res['titulo_entrada']?></h2>
                                </a>
                                <p><?php echo $res['entrada']?></p>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="bi bi-columns-gap"></i> <?php echo $res['categoria_entrada']?></a></li>
                                    <li><a href="#"><i class="bi bi-chat-square"></i> <?php echo $res['comentarios_entrada']?> comentarios</a></li>
                                </ul>
                            </div>
                        </article>
                        <p><br></p>
                    <?php
                        }
                    ?>  
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
    <?php
        require('components/js_portafolio.html');
    ?>
</body>
</html>