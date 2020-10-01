<?php
	require_once('core/user_functions.php');
	logoutUser();
	header('Location: index.php');
?>	