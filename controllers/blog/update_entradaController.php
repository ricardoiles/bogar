<?php session_start(); ?>

<?php
    if(!isset($_SESSION['valid'])) {
        header('Location: ../../sign-in.php');
    }
?>

<html>
<head>
	<title>Update Data</title>
</head>

<body>
    <?php
        //including the database connection file
        include_once("../../connection/config.php");

        if(isset($_POST['actualizar'])) {	
			$id_entrada = $_POST['id_entrada'];
            $fecha = $_POST['input_fecha'];
            $titulo = $_POST['input_titulo'];
            $entrada = $_POST['input_entrada'];
            $categoria = $_POST['input_categoria'];
            $loginId = $_SESSION['id'];
                    
            // fecha actual
            $DateAndTime = new DateTime('', new DateTimeZone('America/Mexico_City'));
            $DateAndTime = $DateAndTime->format('m-d-Y · h:i A');
                
            //insert data to database	
            $result = mysqli_query($mysqli, "UPDATE blog 
                                            set titulo_entrada = '$titulo', 
                                            fecha_entrada = '$DateAndTime', 
                                            entrada = '$entrada',
                                            categoria_entrada = '$categoria',
                                            modificacion_entrada = '$DateAndTime'
                                            WHERE id_entrada = ".$id_entrada);
            
            // //display success message
            $_SESSION['message'] = 'Entrada actualizada';
            $_SESSION['message_type'] = 'info';

            header('Location: ../../views/dashboard/blog/admin-entrada.php');
        }
    ?>
</body>
</html>
