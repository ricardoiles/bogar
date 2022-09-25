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
        include_once("../../php/sign-in/config.php");

        
			
            $id = $_GET['id_entrada'];
            $loginId = $_SESSION['id'];
                    
            // if all the fields are filled (not empty) 
                
            //insert data to database	
            // $result = mysqli_query($mysqli, "INSERT INTO blog(fecha_entrada, titulo_entrada, entrada, categoria_entrada) VALUES('$fecha','$titulo','$entrada', '$categoria')");
            $result = mysqli_query($mysqli, "UPDATE blog set estado_entrada = 0 Where id_entrada = ".$id);
            
            
            // //display success message
            $_SESSION['message'] = 'Se elimino la entrada';
            $_SESSION['message_type'] = 'danger';

            header('Location: admin-entrada.php');
        
    ?>
</body>
</html>
