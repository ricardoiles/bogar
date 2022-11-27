<?php session_start(); ?>

<?php
    if(!isset($_SESSION['valid'])) {
        header('Location: ../../sign-in.php');
    }
?>

<html>
<head>
	<title>create Data</title>
</head>

<body>
    <?php
        //including the database connection file
        include_once("../../connection/config.php");
        // crear servicio
        if(isset($_POST['nuevo_servicio'])) {	
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $tipo = "servicio";
            
            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO servicios(tipo, titulo, descripcion) 
            values ('$tipo', '$titulo', '$descripcion') ");

            //display success message
            $_SESSION['message'] = 'Servicio '.$titulo.' creado';
            $_SESSION['message_type'] = 'success';

            header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
        // editar servicio
        if(isset($_POST['editar_servicio'])) {	
            $idservicio = $_POST['id_servicio'];
            $titulo = $_POST['title'];
            $descripcion = $_POST['description'];
            
            //insert data to database	
            $result = mysqli_query($mysqli, "UPDATE servicios 
                                            set tipo = 'servicio',
                                            titulo = '$titulo',
                                            descripcion = '$descripcion'
                                            WHERE id_servicio = ".$idservicio);
            
           //display success message
           $_SESSION['message'] = 'Servicio editado';
           $_SESSION['message_type'] = 'success';
           

           header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
        // eliminar servicio
        if(isset($_GET['id_servicio'])) {	
            $servicio = $_GET['id_servicio'];
            
            // delete data to database	
            $result = mysqli_query($mysqli, "DELETE FROM servicios Where id_servicio = ".$servicio);

            //display success message
            $_SESSION['message'] = 'Servicio eliminado';
            $_SESSION['message_type'] = 'info';
            

            header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
        // ---------------------------------- clase ------------------------------
        // crear clase
        if(isset($_POST['nueva_clase'])) {	
            $titulo = $_POST['titulo'];
            echo "".$descripcion = $_POST['description'];
            $tipo = "clase";
            
            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO servicios(tipo, titulo, descripcion) 
            values ('$tipo', '$titulo', '$descripcion') ");

            //display success message
            $_SESSION['message'] = 'Clase '.$titulo.' creada';
            $_SESSION['message_type'] = 'success';

            header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
        // editar servicio
        if(isset($_POST['editar_clase'])) {	
            $idclase = $_POST['id_clase'];
            $titulo = $_POST['title'];
            $descripcion = $_POST['description'];
            
            //insert data to database	
            $result = mysqli_query($mysqli, "UPDATE servicios 
                                            set tipo = 'clase',
                                            titulo = '$titulo',
                                            descripcion = '$descripcion'
                                            WHERE id_servicio = ".$idclase);
            
           //display success message
           $_SESSION['message'] = 'Clase editada';
           $_SESSION['message_type'] = 'success';
           

           header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
        // eliminar servicio
        if(isset($_GET['id_clase'])) {	
            $clase = $_GET['id_clase'];
            
            // delete data to database	
            $result = mysqli_query($mysqli, "DELETE FROM servicios Where id_servicio = ".$clase);

            //display success message
            $_SESSION['message'] = 'Servicio eliminado';
            $_SESSION['message_type'] = 'info';
            

            header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
    ?>
</body>
</html>
