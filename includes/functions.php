<?php

if(!defined('included')){
	die('Unauthorized access prohibited');
}

//login func

function login($user, $pass){

	$user = strip_tags(mysql_real_escape_string($user));
	$pass = strip_tags(mysql_real_escape_string($pass));

	$pass = md5($pass);

	//check if user id + pw combination is authentic 

	$sql = "SELECT * FROM members WHERE username = '$user' AND password = '$pass'";
	$result = mysql_query($sql) or die('Query failed' . mysql_error());
	if (mysql_num_rows(($result) == 1){

		$_SESSION['authorized'] = true;

		header('Locstion: '.DIRADMIN);
		exit();
	} else {

		$_SESSION['error'] = 'Sorry, wrong username or password';
	}
	})
}

function logged_in(){
	if($_SESSION['authorized'] == true){
		return true;
	} else {
		return false;
	}
}

function login_required(){
	if(logged_in()){
		return true;
	} else{
		header('Location:' .DIRADMIN.'login.php');
		exit();
	}
}

function logout(){
	unser($_SESSION['authorized']);
	header('Location:' .DIRADMIN.'login.php');
	exit();
}

function messages() {
	$message='';
	if($_SESSION['success'] !=''){
		$message='<div class="msg-ok">'.$SESSION['success'].'</div>';
	}

	if($_SESSION['eror'] != '') {
		$message = '<div class="msg-error">'.$_SESSION['error'].'</div>';
			$_SESSION['error'] = '';
		}
		echo "$message";
}


function errors($error){
	if (!empty($error))
	{
		$i = 0;
		while ($i < count(($error)){
			$showError.="<div class="msg-error">".$error[$i]."</div>";
			$i ++;}
			echo $showError;
	}
}

