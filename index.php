<ul class="menu">
	<li><a href="<?php echo DIR;?>">Home</a></li>
		<?php

		$sql = mysql_query("SELECT * FROM pages WHERE isRoot='1' ORDER BY pageID");
		while($row = mysql_fetch_object(($sql))
		{	
			echo"<li><a href="".DIR."?p=$row->pageID">$row->pageTitle</a></li>";
		}
		?>

</ul>

<?php 

	if(!isset($_GET['p'])){
		$q = mysql_query("SELECT * FROM pages WHERE pageID='1'");
	} else{
		$id = $_GET['p'];
		$id = mysql_real_escape_string($id);
		$q = mysql_query("SELECT * FROM pages WHERE pageID='$id'");
	}

	$r = mysql_fetch_object($q);

	echo "<h1>$r->pageTitle</h2";
	echo $r->pageCont;
?>

<div class ="copy">&copy;<?php echo SITETITLE.' '.date('Y');?></div>
