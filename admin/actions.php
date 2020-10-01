<?php

	require_once("../lib/settings.php");
	$link = db_connect();
	
	if(isset($_GET['action']))
		$action = $_GET['action'];
	else
		$action = "";
	if($action == "add"){
		if(!empty($_POST)){
			add_post($link, $_POST['title'], $_POST['date'], $_POST['content'], $_FILES['img'], $_SESSION['userName']);
			echo("<script>location.href='index.php'</script>");
		}
		
		include("templates/post.php");
	}else if($action == "edit"){
		if(!isset($_GET['id']))
			header("Location: index.php");
		$id = (int)$_GET['id'];
		
		if(!empty($_POST) && $id > 0){
			edit_post($link, $id, $_POST['title'], $_POST['content'], $_POST['date'], $_FILE['img'], $_SESSION['userName']);
				echo("<script>location.href='index.php'</script>");
		}
		
		$post = posts_get($link, $id);
		include("templates/post.php");
	
	}else if($action == "delete"){
		$id = $_GET['id'];
		$img = $_GET['img'];
		$posts = delete_post($link, $id, $img);
		echo("<script>location.href='index.php'</script>");
	}else{
		$posts = posts_view($link);
		include("templates/main.php");
	}

?>