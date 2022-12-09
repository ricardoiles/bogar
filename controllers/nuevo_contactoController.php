<html>
<head>
	<title>create Data</title>
</head>

<body>
    <?php
        //including the database connection file
        include_once("../connection/config.php");
        // crear clase
        if(isset($_POST['nuevo_contacto'])) {	
            $titulo = $_POST['titulo'];
            $mensaje = $_POST['mensaje'];
            $nombres = $_POST['nombres'];
            $whatsapp = $_POST['whatsapp'];
            $email = $_POST['email'];
            
            //insert data to database	
            $result = mysqli_query($mysqli, "INSERT INTO contacto(nombres, email, whatsapp, titulo, mensaje) 
            values ('$nombres', '$email', '$whatsapp', '$titulo', '$mensaje') ");

            header('Location: ../contact.php');
        }

    ?>
</body>
</html>
