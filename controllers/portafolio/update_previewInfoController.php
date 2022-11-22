<?php session_start(); ?>

<?php
    if(!isset($_SESSION['valid'])) {
        header('Location: ../../sign-in.php');
    }

    $conn = mysqli_connect('localhost','root','','bogar');
?>

<html>
<head>
	<title>Update Data</title>
</head>

<body>
    <?php
        //including the database connection file
        // include_once("../../connection/config.php");

        if(isset($_POST['updatepreviewinfo'])){
            $id_info = $_POST['id_info'];
            $descripcion = $_POST['descripcion'];
            $imagen = $_FILES['imagen']['name'];
            $correo = $_POST['correo'];
            $telefono = $_POST['telefono'];
            $ubicacion = $_POST['ubicacion'];
        
            if(isset($imagen) && $imagen != ""){
                $tipo = $_FILES['imagen']['type'];
                $temp  = $_FILES['imagen']['tmp_name'];
        
               if( !((strpos($tipo,'jpg') || strpos($tipo,'jpg') || strpos($tipo,'jpeg') || strpos($tipo,'webp')))){
                  $_SESSION['message'] = 'solo se permite archivos jpeg, jpg, png, webp';
                  $_SESSION['message_type'] = 'danger';
                  header('Location: ../../views/dashboard/portafolio/admin-index.php');
               }else{
                 $query = "UPDATE preview_info SET descripcion = '$descripcion', imagen = '$imagen', correo = '$correo', telefono = '$telefono', ubicacion = '$ubicacion' WHERE id_info = ".$id_info;
                 $resultado = mysqli_query($conn,$query);
                 if($resultado){
                      move_uploaded_file($temp,'../../img/upload_images/'.$imagen);   
                     $_SESSION['message'] = 'se ha subido correctamente';
                     $_SESSION['message_type'] = 'success';
                     header('Location: ../../views/dashboard/portafolio/admin-index.php');
                 }else{
                     $_SESSION['message'] = 'ocurrio un error en el servidor';
                     $_SESSION['message_type'] = 'danger';
                 }
               }
            }
        }
    ?>
</body>
</html>
