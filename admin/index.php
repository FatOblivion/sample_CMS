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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="JavaScript" type="text/javascript">
function delpage(id, title)
{
	if(confirm("Are you sure you want to delete?'"+ title+"'"))
	{
		window.location.href='<?php echo DIRADMIN;?>?delpage=' + id;

	}
}
</script>
</head>
<div id="wrapper">
 
<div id="logo"><a href="<?php echo DIRADMIN;?>"><img src="images/logo.png" alt="<?php echo SITETITLE;?>" border="0" /></a></div>

<div id="navigation">
	<ul class="menu">
		<li><a href="<?php echo DIRADMIN;?>">Admin</a></li>
		<li><a href="<?php echo DIR;?>" target="_blank">View Website</a></li>
		<li>M<a href="<?php echo DIRADMIN;?>?logout">Logout</a></li>
	</ul>
</div>
<div id="content">
 
<?php 
	//show any messages if there are any.
	messages();
?>
 
<h1>Manage Pages</h1>
<table>
<tr>
<th><strong>Title</strong></th>
<th><strong>Action</strong></th>
</tr>

<?php
$sql = mysql_query("SELECT * FROM pages ORDER BY pageID");
while($row = mysql_fetch_object($sql)) 
{
	echo "<tr>";
		echo "<td>$row->pageTitle</td>";
		if($row->pageID == 1){ //home page hide the delete link
			echo "<td><a href="".DIRADMIN."editpage.php?id=$row->pageID">Edit</a></td>";
		} else {
			echo "<td><a href="".DIRADMIN."editpage.php?id=$row->pageID">Edit</a> | <a href="javascript:delpage('$row->pageID','$row->pageTitle');">Delete</a></td>";
		}
		
	echo "</tr>";
}
?>
</table>
 
<p><a href="<?php echo DIRADMIN;?>addpage.php" class="button">Add Page</a></p>
</div>
 
<div id="footer">	
		<div class="copy">&copy; <?php echo SITETITLE.' '. date('Y');?> </div>
</div><!-- close footer -->
</div><!-- close wrapper -->
 
</body>
</html>