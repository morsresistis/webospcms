<?php

//Database Connection

define('MYSQL_SERVER', ''); //Database Server
define('MYSQL_USER', ''); //Database user
define('MYSQL_PASSWORD', ''); //Database password
define('MYSQL_DB', ''); //Database name

//Database connection function

function db_connect(){
	$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die ("Error: ".mysqli_error($link));
	if(!mysqli_set_charset($link, "utf8")){
		printf("Error: ".mysqli_error($link));
	}
	return $link;
}

$link = db_connect();

//Settings

$themes_name = "default"; //Template name, template folder must have the same name
$themes_dir = "views/"; //Common catalog with templates
