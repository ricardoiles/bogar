<?php session_start(); ?>

<?php
    if(!isset($_SESSION['valid'])) {
        header('Location: ../../sign-in.php');
    }
?>

<html>
<head>
	<title>Delete Data</title>
</head>

<body>
    <?php
        //including the database connection file
        include_once("../../connection/config.php");
			
        $id_comentario = $_GET['id_comentario'];
        $id_entrada = $_GET['id_entrada'];
        $loginId = $_SESSION['id'];
            
        // delete data to database	
        $result = mysqli_query($mysqli, "DELETE FROM comentarios_blog Where id_comentario = ".$id_comentario);
        
        // consultar cantidad de comentarios que tiene la entrada que se comento
        $comentarios = mysqli_query($mysqli, "SELECT id_entrada FROM comentarios_blog 
        WHERE id_entrada = ".$_GET['id_entrada']);

        // cantidad de comentarios en esta entrada
        $comentarios = mysqli_num_rows( $comentarios );

        // guardar cant. de comentarios en tabla blog
        $cantidad_comentarios = mysqli_query($mysqli, "UPDATE blog set comentarios_entrada = ".$comentarios." WHERE id_entrada = ".$id_entrada);

        // display success message
        $_SESSION['message'] = 'Se elimino el comentario';
        $_SESSION['message_type'] = 'info';

        header('Location: ../../views/dashboard/blog/edit_entrada.php?id_entrada='.$id_entrada);
        
    ?>
</body>
</html>
