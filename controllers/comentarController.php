<html>
<head>
	<title>Add Comment</title>
</head>

<body>
    <?php
        //including the database connection file
        include_once("../pages/php/sign-in/config.php");

        if(isset($_POST['nuevo_comentario'])) {	
            $id_entrada = $_POST['id_entrada'];
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $comentario = $_POST['comentario'];
                
            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO comentarios_blog(id_entrada, usuario, email, comentario) 
                                            VALUES('$id_entrada','$usuario','$email', '$comentario')");

            // consultar cantidad de comentarios que tiene la entrada que se comento
            $comentarios = mysqli_query($mysqli, "SELECT id_entrada FROM comentarios_blog 
                                                WHERE id_entrada = ".$_POST['id_entrada']);
            
            // cantidad de comentarios en esta entrada
            $comentarios = mysqli_num_rows( $comentarios );
                
            // guardar cant. de comentarios en tabla blog
            $cantidad_comentarios = mysqli_query($mysqli, "UPDATE blog set comentarios_entrada = ".$comentarios." WHERE id_entrada = ".$id_entrada);
            
            // volver al single page donde se comento
            header('Location: ../single-blog.php?id_blog='.$_POST['title']);
        }
    ?>
</body>
</html>
