<?php
ob_start();
session_start();

//Db properties

define('DBHOST','host');
define('DBUSER', 'Db username');
define('DBPASS', 'password');
define('DBNAME', 'database name');

//db con

$conn = @mysql_connect(DBHOST, DBUSER, DBPASS);
$conn = @mysql_select_db(DBNAME);
if(!$conn){
	die("Sorry! There seems to be a DB connection error");
}

//site path

define('DIR', 'http://www.domain.com');

//define admin path
define('DIRADMIN', 'http://www.domain.com/admin/');
//define title
define('SITETITLE', 'Simple CMS');

//define include checker
define('included', 1);

include('functions.php');
?>