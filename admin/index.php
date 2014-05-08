<?php
		if($_POST['submit']){
			login($_POST['username'], $_POST['password']);
		}
?>

<?php require('../includes/config.php');

login_required();

if(isset($_GET['logout'])){
	logout();
}

if(isset($_GET['delpage'])){
	$delpage = $_GET['delpage'];
	$delpage = mysql_real_escape_string($del);
	$sql = mysql_query("DELETE FROM pages WHERE pageID = '$delpage'");
	$_SESSION['success'] = "Page Deleted"
;

	header('Location: '.DIRADMIN);
	exit();
}

?>