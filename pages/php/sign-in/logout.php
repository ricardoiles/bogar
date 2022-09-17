<?php
	require 'config.php';
	session_destroy();

	header('Location: ../../sign-in.php');
?>
