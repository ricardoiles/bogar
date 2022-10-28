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
            $idred = $_POST['idlink'];
            $namered = $_POST['namelink'];
            $link = $_POST['inputlink'];
            
            //insert data to database	
            $result = mysqli_query($mysqli, "UPDATE links_redes 
                                            set link = '$link'
                                            WHERE id_link = ".$idred);
            
            //display success message
            $_SESSION['message'] = 'Link de '.$namered.' actualizado';
            $_SESSION['message_type'] = 'success';

            header('Location: ../../views/dashboard/portafolio/admin-index.php');
        }
    ?>
</body>
</html>
