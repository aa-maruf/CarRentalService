<?php
	session_start();
	session_destroy();
	header("Location: Landing_Page.php");
    exit();
?>