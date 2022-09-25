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
        include_once("../../php/sign-in/config.php");

        if(isset($_POST['actualizar'])) {	
			
            $fecha = $_POST['input_fecha'];
            $titulo = $_POST['input_titulo'];
            $entrada = $_POST['input_entrada'];
            $categoria = $_POST['input_categoria'];
            $loginId = $_SESSION['id'];
                    
            // if all the fields are filled (not empty) 
                
            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO blog(fecha_entrada, titulo_entrada, entrada, categoria_entrada) VALUES('$fecha','$titulo','$entrada', '$categoria')");
            
            // //display success message
            $_SESSION['message'] = 'Entrada actualizada';
            $_SESSION['message_type'] = 'info';

            header('Location: admin-entrada.php');
        }
    ?>
</body>
</html>
