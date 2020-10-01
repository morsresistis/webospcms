<?php
session_start();
function registerUser($user,$pass1,$pass2){
	$errorText = '';

	if ($pass1 != $pass2) $errorText = "Passwords are not identical!";
	elseif (strlen($pass1) < 6) $errorText = '<div class="alert alert-danger" role="alert">Password should contain 6 characters</div>';

	$pfile = fopen("userpwd/userpwd.txt","a+");
    rewind($pfile);

    while (!feof($pfile)) {
        $line = fgets($pfile);
        $tmp = explode(':', $line);
        if ($tmp[0] == $user) {
            $errorText = '<div class="alert alert-danger" role="alert">Login Exists</div>';
            break;
        }
    }
	
    if ($errorText == ''){
		$userpass = md5($pass1);
    	$reg_date = date('l jS \of F Y h:i:s A');
		fwrite($pfile, "\r\n$user:$userpass:$reg_date");
    }
    
    fclose($pfile);
	
	
	return $errorText;
}

function loginUser($user,$pass){
	$errorText = '';
	$validUser = false;
	
	$pfile = fopen("userpwd/userpwd.txt","r");
    rewind($pfile);

    while (!feof($pfile)) {
        $line = fgets($pfile);
        $tmp = explode(':', $line);
        if ($tmp[0] == $user) {
            if (trim($tmp[1]) == trim(md5($pass))){
            	$validUser= true;
            	$_SESSION['userName'] = $user;
               
            }

            break;
        }
    }
    fclose($pfile);

    if ($validUser != true) $errorText = '<div class="alert alert-danger" role="alert">Wrong login or password!</div>';
    
    if ($validUser == true) $_SESSION['validUser'] = true;
    else $_SESSION['validUser'] = false;
	
	return $errorText;	
}

function logoutUser(){
	unset($_SESSION['validUser']);
	unset($_SESSION['userName']);
}

function checkUser(){
	if ((!isset($_SESSION['validUser'])) || ($_SESSION['validUser'] != true)){
		header('Location: login.php');
	}
}

?>