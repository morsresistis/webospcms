<?php

require_once("lib/settings.php");
require_once("lib/functions.php");


include($themes_dir.$themes_name."/views/head.php");
$link = db_connect();
$posts = posts_view($link);
include($themes_dir.$themes_name."/views/main.php");
include($themes_dir.$themes_name."/views/footer.php");

?>