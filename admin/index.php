<?php
	require_once("../lib/settings.php");
	require_once("../lib/functions.php");
	require_once("core/user_functions.php");
    checkUser();
    include($admin_templates."head.php");
    require_once("actions.php");