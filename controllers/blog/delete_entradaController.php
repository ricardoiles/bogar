<?php session_start(); ?>

<?php
    if(!isset($_SESSION['valid'])) {
        header('Location: ../../sign-in.php');
    }
?>

<html>
<head>
	<title>Delete/update Data</title>
</head>

<body>
    <?php
        //including the database connection file
        include_once("../../connection/config.php");

        
			
            $id = $_GET['id_entrada'];
            $loginId = $_SESSION['id'];
                    
            // fecha actual
            $DateAndTime = new DateTime('', new DateTimeZone('America/Mexico_City'));
            $DateAndTime = $DateAndTime->format('m-d-Y · h:i A');
            
            //update data to database	
            $result = mysqli_query($mysqli, "UPDATE blog set estado_entrada = 0, eliminacion_entrada = '$DateAndTime' Where id_entrada = ".$id);
            
            
            // //display success message
            $_SESSION['message'] = 'Se elimino la entrada';
            $_SESSION['message_type'] = 'danger';

            header('Location: ../../views/dashboard/blog/admin-entrada.php');
        
    ?>
</body>
</html>
