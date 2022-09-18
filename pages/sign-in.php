<?php session_start(); ?>

<!doctype html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>César Nuñez | Músico</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image" href="../img/svg_icon/logocesarnuñez.svg">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/audioplayer.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/gijgo.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/customstyles.css">
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style>
      body {
        font-family: "Public Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif !important;
      }
    </style>
</head>

<body>
<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card bg-white" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="../img/about/storytelling.png"
                alt="../img/about/storytelling.png" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body  text-black">
              <?php
                // include("connection.php");
                include('php/sign-in/config.php');

                if(isset($_POST['login'])) {
                  $user = mysqli_real_escape_string($mysqli, $_POST['username']);
                  $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

                  $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$user' AND password='$pass'")
                        or die("Could not execute the select query.");
                  
                  $row = mysqli_fetch_assoc($result);
                  
                  if(is_array($row) && !empty($row)) {
                    $validuser = $row['username'];
                    $_SESSION['valid'] = $validuser;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                  } else {
                    echo "Usario o contraseñas incorrectos";
                    echo "<br/>";
                    echo "<a href='sign-in.php' class='text-danger'>Reintentar</a>";
                  }

                  if(isset($_SESSION['valid'])) {
                    header('Location: dashboard/dash.php');			
                  }
                  
                } else {
              ?>
                <form name="form-login" action="" method="post">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="../img/svg_icon/logocesarnuñez.png" alt="logocesarnuñez" width="70px"> &nbsp;
                    <span class="h1 fw-bold mb-0">César Nuñez</span>
                  </div>
                  <div class="form-outline mb-4">
                    <h5 class="fw-normal" style="letter-spacing: 1px;">Ingresa a tu cuenta para administrar tu portafolio</h5> 
                    <?php
                        if(isset($errMsg)){
                            echo '<span style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</span>';
                        }
                    ?>
                    <input name="username" type="text" id="form2Example17" class="form-control form-control-lg" 
                           placeholder="Usuario"/> <br>
                    <input name="password" type="password" id="form2Example27" class="form-control form-control-lg" 
                           placeholder="Contraseña"/> <br>

                    <input type="submit" name='login' class="btn btn-danger btn-lg btn-block" value="Ingresar"/> 
                    <hr>

                    <a class="small text-muted" href="#">Olvide mi contraseña</a>
                  </div>
                </form>
              <?php
                }
              ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>