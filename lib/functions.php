<?php

define('PER_PAGE', 5);

function posts_view($link) {
	$page = (!isset($_GET['page'])) ? $page = 0:$page = $_GET['page'];
	$page = $_GET['page'];
	$page = $page*PER_PAGE;
	$query = "SELECT * FROM articles ORDER by id DESC LIMIT ".$page.",".PER_PAGE;

	$result = mysqli_query($link, $query);
	if(!$result)
		die(mysqli_error($link));
	$n = mysqli_num_rows($result);
	$posts = array();

	for($i = 0; $i < $n; $i++) {
		$row = mysqli_fetch_assoc($result);
		$posts[] = $row;
	}
	return $posts;
}

function posts_get($link, $id_posts){
	$query = sprintf("SELECT * FROM articles WHERE id = %d", (int)$id_posts);
	$result = mysqli_query($link, $query);
	if(!$result)
		die(mysqli_error($link));
	$posts = mysqli_fetch_assoc($result);
	return $posts;
}

function cut_text($text, $len = 250){
	return mb_substr($text, 0, $len);
}


function page(){
	$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
	$sql = "SELECT COUNT(*) FROM articles";

	if($res = mysqli_query($link, $sql)){
		$res = $res->fetch_assoc();
		$res = ceil($res['COUNT(*)']/PER_PAGE);
	}
	return $res;
}

function pagination($pages){
	echo '<li class="page-item"><a class="page-link" href="index.php?page=0">Start</a></li>&nbsp;';

	for($i=0; $i < $pages; $i++){
		$page = $_GET['page'];
		if($i < ($page - PER_PAGE) || $i > ($page + PER_PAGE)) continue;

		if($page == $i){
			echo '<li class="page-item active"><a class="page-link" href="index.php?page='.$i.'">'.($i+1).'</a></li>&nbsp;';
		}else{
			echo '<li class="page-item"><a class="page-link" href="index.php?page='.$i.'">'.($i+1).'</a></li>&nbsp;';
		}
	}
	echo '<li class="page-item"><a class="page-link" href="index.php?page='.($pages-1).'">End</a></li>&nbsp;';
}


function add_post($link, $title, $date, $content, $img, $userName){
	$uploaddir = '../uploads/';
	$img = $uploaddir.basename($_FILES['img']['name']);

	$title = trim($title);
	$content = trim($content);
	$img = trim($img);
	$userName = trim($userName);

	if ($title == "")
		return false;
	if (copy($_FILES['img']['tmp_name'], $img))
		$img = substr($img, 2);

	$t = "INSERT INTO articles (title, date, content, img, userName) VALUES ('%s', '%s', '%s', '%s', '%s')";

	$query = sprintf($t, mysqli_real_escape_string($link, $title),
							mysqli_real_escape_string($link, $date),
							mysqli_real_escape_string($link, $content),
							mysqli_real_escape_string($link, $img),
							mysqli_real_escape_string($link, $userName));
	$result = mysqli_query($link, $query);
	if (!result)
		die(mysqli_error($link));
	return true;
}

function edit_post($link, $id, $title, $content, $date, $img, $userName){

	$title = trim($title);
	$content = trim($content);
	$date = trim($date);
	$uploaddir = '../uploads/';
	$img = $uploaddir.basename($_FILES['img']['name']);

	$userName = trim($userName);

	$id = (int)$id;

	if($img == ''){
		$img = 'NULL';
	}
	if(copy($_FILES['img']['tmp_name'], $img))
		$img = substr($img, 2);
	$sql = "UPDATE articles SET title='%s', content='%s', date='%s', img='%s', userName='%s' WHERE id='%d'";

	$query = sprintf($sql, mysqli_real_escape_string($link, $title),
							mysqli_real_escape_string($link, $content),
							mysqli_real_escape_string($link, $date),
							mysqli_real_escape_string($link, $img),
							mysqli_real_escape_string($link, $userName),
							$id);
	$result = mysqli_query($link, $query);
		if(!$result)
			die(mysqli_error($link));
		return mysqli_affected_rows($link);
}

function delete_post($link, $id, $img){
	$id = (int)$id;
	$img = (string)$img;

	if($id == 0)
		return false;
	unlink('..'.$img);

	$query = sprintf("DELETE FROM articles where id = '%d'", $id);

	$result = mysqli_query($link, $query);
	if(!$result)
		die(mysqli_error($link));
	return mysqli_affected_rows($link);
}
?>