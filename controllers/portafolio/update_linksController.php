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

        if(isset($_POST['updatelinks'])) {	
            $data = array(
                "red" => $_POST['facebook'],
                "red1" => $_POST['whatsapp'],
                "red" => $_POST['youtube'],
                "red" =>  $_POST['instagram'],
                "red" =>  $_POST['tiktok'],
                "red" =>  $_POST['platzi'],
                "red" =>  $_POST['linktree'],
            );
            $libro = new stdClass();
            $libro->titulo = "Las legiones malditas";
            $libro->autor = "Santiago Posteguillo";
            $libro->editorial = "Ediciones B";
            $libro->fechaPublicacion = 2008;

            var_dump($libro);
            foreach ($libro as $key => $testimonials) {
                foreach($testimonials as $testimonial) {
       
                    // escape data to avoid sql injection
                    $id = mysql_escape_string($testimonial->id);
                    $name = mysql_escape_string($testimonial->name);
                    $content = mysql_escape_string($testimonial->content);
       
                    // $sql = "UPDATE testimonials SET name='$name', content='$content' WHERE id='$id'";
                    // $db->query($sql);
       
                    // TODO check for database error here
       
               }
           }

            // echo $datos = json_encode($data, true);

            // foreach($data as $red => $r) {
                // $result = mysqli_query($mysqli, "UPDATE links_redes 
                //                             set link = '' 
                //                             ");
                // $mysqli->query($result) or die($mysqli->error);
                
            //   }
            

            //insert data to database	
            // $result = mysqli_query($mysqli, "UPDATE links_redes 
            //                                 set nombre_link = '$face'
            //                                 ");
            
            // //display success message
            // $_SESSION['message'] = 'Links redes sociales actualizados';
            // $_SESSION['message_type'] = 'info';

            // header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
    ?>
</body>
</html>
