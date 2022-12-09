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
            $direccion = $_POST['direccion'];
        
            if(isset($imagen) && $imagen != ""){
                $tipo = $_FILES['imagen']['type'];
                $temp  = $_FILES['imagen']['tmp_name'];
        
               if( !((strpos($tipo,'jpg') || strpos($tipo,'png') || strpos($tipo,'jpeg') || strpos($tipo,'webp')))){
                  $_SESSION['message'] = 'solo se permite archivos jpeg, jpg, png, webp';
                  $_SESSION['message_type'] = 'danger';
                  header('Location: ../../views/dashboard/portafolio/admin-index.php');
               }else{
                 $query = "UPDATE preview_info SET descripcion = '$descripcion', imagen = '$imagen', correo = '$correo', 
                    telefono = '$telefono', ubicacion = '$ubicacion', direccion = '$direccion' WHERE id_info = ".$id_info;
                 $resultado = mysqli_query($conn,$query);
                 if($resultado){
                      move_uploaded_file($temp,'../../img/upload_images/'.$imagen);   
                     $_SESSION['message'] = 'Se ha actualizado correctamente';
                     $_SESSION['message_type'] = 'success';
                     header('Location: ../../views/dashboard/portafolio/admin-index.php');
                 }else{
                     $_SESSION['message'] = 'Ocurrió un error en ls actualización';
                     $_SESSION['message_type'] = 'danger';
                     header('Location: ../../views/dashboard/portafolio/admin-index.php');
                 }
               }
            }
        }

        // quien es cesar - información sobre mi
        if(isset($_POST['updatecesar'])){
            $id_mi = $_POST['id_mi'];
            $seccion = "cesar";
            $descripcion = $_POST['descripcion'];
            $foto = $_FILES['foto']['name'];
        
            if(isset($foto) && $foto != ""){
                $tipo = $_FILES['foto']['type'];
                $temp  = $_FILES['foto']['tmp_name'];
        
               if( !((strpos($tipo,'jpg') || strpos($tipo,'png') || strpos($tipo,'jpeg') || strpos($tipo,'webp')))){
                  $_SESSION['message'] = 'solo se permite archivos jpeg, jpg, png, webp';
                  $_SESSION['message_type'] = 'danger';
                  header('Location: ../../views/dashboard/portafolio/admin-index.php');
               }else{
                 $query = "UPDATE sobre_mi SET seccion = '$seccion', descripcion = '$descripcion', foto = '$foto' WHERE id_mi = ".$id_mi;
                 $resultado = mysqli_query($conn,$query);
                 if($resultado){
                      move_uploaded_file($temp,'../../img/upload_images/'.$foto);   
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

        // conoce mi historia - información sobre mi
        if(isset($_POST['updatehistoria'])){
            $id_mi = $_POST['id_mi'];
            $seccion = "historia";
            $descripcion = $_POST['descripcion'];
            $foto = $_FILES['foto']['name'];
        
            if(isset($foto) && $foto != ""){
                $tipo = $_FILES['foto']['type'];
                $temp  = $_FILES['foto']['tmp_name'];
        
               if( !((strpos($tipo,'jpg') || strpos($tipo,'png') || strpos($tipo,'jpeg') || strpos($tipo,'webp')))){
                  $_SESSION['message'] = 'solo se permite archivos jpeg, jpg, png, webp';
                  $_SESSION['message_type'] = 'danger';
                  header('Location: ../../views/dashboard/portafolio/admin-index.php');
               }else{
                 $query = "UPDATE sobre_mi SET seccion = '$seccion', descripcion = '$descripcion', foto = '$foto' WHERE id_mi = ".$id_mi;
                 $resultado = mysqli_query($conn,$query);
                 if($resultado){
                      move_uploaded_file($temp,'../../img/upload_images/'.$foto);   
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

        // -------------------- editar datos de usuario -----------------------
        if(isset($_POST['editar_datos'])){
            $id_user = $_POST['id_user'];
            $username = $_POST['username'];
            $logo = $_FILES['logo']['name'];
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $pin = $_POST['pin'];
        
            if(isset($logo) && $logo != ""){
                $tipo = $_FILES['logo']['type'];
                $temp  = $_FILES['logo']['tmp_name'];
        
               if( !((strpos($tipo,'jpg') || strpos($tipo,'png') || strpos($tipo,'jpeg') || strpos($tipo,'webp')))){
                  $_SESSION['message'] = 'Solo se permite archivos jpeg, jpg, png, webp';
                  $_SESSION['message_type'] = 'danger';
                  header('Location: ../../views/dashboard/portafolio/admin-datos.php');
               }else{
                 $query = "UPDATE user SET username = '$username', password = '$password', pin = '$pin', 
                    name = '$name', lastname = '$lastname', logo = '$logo' WHERE id_user = ".$id_user;
                 $resultado = mysqli_query($conn,$query);
                 if($resultado){
                      move_uploaded_file($temp,'../../img/upload_images/'.$logo);   
                     $_SESSION['message'] = 'Se han actualizado tus datos correctamente';
                     $_SESSION['message_type'] = 'success';
                     header('Location: ../../views/dashboard/portafolio/admin-datos.php');
                 }else{
                     $_SESSION['message'] = 'Ocurrió un error en la actualización';
                     $_SESSION['message_type'] = 'danger';
                     header('Location: ../../views/dashboard/portafolio/admin-datos.php');
                 }
               }
            }
        }
    ?>
</body>
</html>
