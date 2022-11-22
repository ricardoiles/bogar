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
        // nuevo servicio code
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
    ?>
</body>
</html>
