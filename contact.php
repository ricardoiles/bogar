<?php 
    //including the database connection file
include_once("connection/config.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM blog WHERE estado_entrada = 1 ORDER BY creacion_entrada desc");
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
                        <h3>contáctame</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->
     <!-- ================ contact section start ================= -->
  <section class="contact-section section_padding bg-light" style="margin-top:-50px">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 class="contact-title">Ponte en contacto conmigo</h2>
        </div>
        <div class="col-lg-8">
          <form class="form-contact contact_form" action="controllers/nuevo_contactoCOntroller.php" method="post" id="contactForm">
            <div class="row">
            <div class="col-12">
                <div class="form-group">
                  <input class="form-control bg-white bg-white" name="titulo" id="subject" type="text" 
                    placeholder = 'Escribe el asunto' required maxlength="200">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control bg-white w-100" name="mensaje" id="message" cols="30" 
                      rows="9" placeholder = 'Escribe aquí tu mensaje' required maxlength="500"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control bg-white" name="nombres" id="name" type="text"  
                    placeholder = 'Escribe tu nombre y apellido' required maxlength="100">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input class="form-control bg-white" name="whatsapp" id="number" type="text" 
                    placeholder = 'WhatsApp: ej: +52 123456789' required maxlength="50">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control bg-white" name="email" id="email" type="email" 
                    placeholder = 'Escribe aquí tu email' required maxlength="200">
                </div>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="submit" name="nuevo_contacto" value="Enviar mensaje" 
                class="button button-contactForm btn_4 boxed-btn">
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <?php
            //consultar link por red
            $infor = mysqli_query($mysqli, "SELECT * FROM preview_info");
            while($info = mysqli_fetch_array($infor)) {	
          ?>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-home"></i></span>
            <div class="media-body">
              <h3><?php echo $info['ubicacion'];?></h3>
              <p><?php echo $info['direccion'];?></p>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
            <div class="media-body">
              <h3><?php echo $info['telefono'];?></h3>
            </div>
          </div>
          <div class="media contact-info">
            <span class="contact-info__icon"><i class="ti-email"></i></span>
            <div class="media-body">
              <h3><?php echo $info['correo'];?></h3>
              <p>¡Envíame tu consulta cuando quieras!</p>
            </div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
  </section>
  <!-- ================ contact section end ================= -->

    <!-- footer start -->
        <?php include 'components/footer.php';?>
    <!--/ footer end  -->
    <!-- JS here -->
    <?php
        require('components/js_portafolio.html');
    ?>
</body>
</html>