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
        // crear experiencia
        if(isset($_POST['nueva_experiencia'])) {	
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $tipo = "experiencia";
            $fecha = $_POST['fecha'];
            
            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO expe_traye(tipo, titulo, descripcion, fecha_lugar) 
            values ('$tipo', '$titulo', '$descripcion', '$fecha') ");

            //display success message
            $_SESSION['message'] = 'Experincia '.$titulo.' creada';
            $_SESSION['message_type'] = 'success';

            header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
        
        // editar experiencia
        if(isset($_POST['editar_experiencia'])) {
            $id_et = $_POST['id_et'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fecha = $_POST['fecha'];
            
            //insert data to database	
            $result = mysqli_query($mysqli, "UPDATE expe_traye 
                                            set titulo = '$titulo',
                                            descripcion = '$descripcion',
                                            fecha_lugar = '$fecha'
                                            WHERE id_et = ".$id_et);
            
           //display success message
           $_SESSION['message'] = 'Experiencia '.$titulo.' editada';
           $_SESSION['message_type'] = 'success';
           

           header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }

        // eliminar servicio
        if(isset($_GET['id_experiencia'])) {	
            $experiencia = $_GET['id_experiencia'];
            
            // delete data to database	
            $result = mysqli_query($mysqli, "DELETE FROM expe_traye where id_et = ".$experiencia);

            //display success message
            $_SESSION['message'] = 'Servicio eliminado con éxito';
            $_SESSION['message_type'] = 'info';
            

            header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }

        // ---------------------------------- trayectoria ------------------------------
        // crear trayectoria
        if(isset($_POST['nueva_trayectoria'])) {	
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $tipo = "trayectoria";
            $lugar = $_POST['lugar'];
            
            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO expe_traye(tipo, titulo, descripcion, fecha_lugar) 
            values ('$tipo', '$titulo', '$descripcion', '$lugar') ");

            //display success message
            $_SESSION['message'] = 'Trayectoria '.$titulo.' creada';
            $_SESSION['message_type'] = 'success';

            header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
        
        // editar trayectoria
        // editar experiencia
        if(isset($_POST['editar_trayectoria'])) {
            $id_et = $_POST['id_et'];
            $titulo = $_POST['titulo'];
            $descripcion = $_POST['descripcion'];
            $fecha = $_POST['lugar'];
            
            //insert data to database	
            $result = mysqli_query($mysqli, "UPDATE expe_traye 
                                            set titulo = '$titulo',
                                            descripcion = '$descripcion',
                                            fecha_lugar = '$fecha'
                                            WHERE id_et = ".$id_et);
            
           //display success message
           $_SESSION['message'] = 'Trayectoria '.$titulo.' editada';
           $_SESSION['message_type'] = 'success';
           

           header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }

        // eliminar trayectoria
        if(isset($_GET['id_trayectoria'])) {	
            $trayectoria = $_GET['id_trayectoria'];
            
            // delete data to database	
            $result = mysqli_query($mysqli, "DELETE FROM expe_traye where id_et = ".$trayectoria);

            //display success message
            $_SESSION['message'] = 'Trayectoria eliminada con éxito';
            $_SESSION['message_type'] = 'info';
            

            header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
    ?>
</body>
</html>
