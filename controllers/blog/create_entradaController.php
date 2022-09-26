<?php session_start(); ?>

<?php
    if(!isset($_SESSION['valid'])) {
        header('Location: ../../sign-in.php');        
    }
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
    <?php
        //including the database connection file
        include_once("../../connection/config.php");

        if(isset($_POST['nueva_entrada'])) {	
            $fecha = $_POST['input_fecha'];
            $titulo = $_POST['input_titulo'];
            $entrada = $_POST['input_entrada'];
            $categoria = $_POST['input_categoria'];
            $loginId = $_SESSION['id'];            

            // fecha actual
            $DateAndTime = new DateTime('', new DateTimeZone('America/Mexico_City'));
            $DateAndTime = $DateAndTime->format('m-d-Y · h:i A');

            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO blog(fecha_entrada, titulo_entrada, entrada, categoria_entrada, creacion_entrada) 
                                            VALUES('$DateAndTime','$titulo','$entrada', '$categoria', '$fecha')");
            
            // //display success message
            $_SESSION['message'] = 'Nueva entrada añadida al blog';
            $_SESSION['message_type'] = 'success';

            header('Location: ../../views/dashboard/blog/admin-entrada.php');
        }
    ?>
</body>
</html>
