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
    
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/customstyles.css">
    <!-- icons bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <style>
      body {
        font-family: "Public Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif !important;
      }
        
      .dropbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
      }

      .dropdown {
      position: relative;
      display: inline-block;
      }

      .dropdown-content {
      display: none;
      position: absolute;
      right: 0;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      }

      .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      }

      .dropdown-content a:hover {background-color: #f1f1f1;}

      .dropdown:hover .dropdown-content {
      display: block;
      }

      .dropdown:hover .dropbtn {
      background-color: #3e8e41;
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
                include('../connection/config.php');

                if(isset($_POST['login'])) {
                  $user = mysqli_real_escape_string($mysqli, $_POST['username']);
                  $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

                  $result = mysqli_query($mysqli, "SELECT * FROM user WHERE username='$user' AND password='$pass'")
                        or die("No se pudo ejecutar la consulta. <br> <a href='sign-in.php' class='text-danger'>Reintentar</a>");

                        //   header("Refresh:0");		
                  
                  $row = mysqli_fetch_assoc($result);
                  
                  if(is_array($row) && !empty($row)) {
                    $validuser = $row['username'];
                    $_SESSION['valid'] = $validuser;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                  } else {
                    echo "Usuario o contraseñas incorrectos";
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
                    <div class="dropdown" style="float:left;">
                      <a class="small text-muted" href="#">Olvide mi contraseña </a>
                      <div class="dropdown-content" style="left:0;">
                        <div class="container">
                          <div class="row">
                            <div class="col">
                              <form name="form-forgot" method="post">
                              <div class="mb-3">
                                <br>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Pin de recuperación">
                              </div>
                              <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Nueva contraseña">
                              </div> 
                              <div class="mb-3">
                                <input type="submit" name="forgotpass" class="btn btn-primary" value="Recuperar">
                              </div> 
                              </form>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                    </div>
                    <a class="small text-muted" href="../">&nbsp; | Ver tu portafolio</a>
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
<script>

</script>
</body>
</html>