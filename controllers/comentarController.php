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
            
            // //display success message
            $_SESSION['message'] = 'Comentario creado';
            $_SESSION['message_type'] = 'success';
            
            // volver al single page donde se comento
            header('Location: ../single-blog.php?id_blog='.$_POST['title']);
        }
    ?>
</body>
</html>
