<html>
	<head>
		<?
			include("style.css");
			$deleted = $_POST['deletelist'];
			echo "<title>Deleting IP List ", $deleted, "</title>";
			include("passwordz.php");
			mysql_connect(localhost,$username,$password);
			@mysql_select_db($database) or die("unable to connect to sql database");
		?>
	<meta http-equiv="Refresh" content="2; url=index.php">
	</head>
	<body>
		<?
			echo "<h1>Deleting IP List ", $deleted, "...</h1>\n";
			mysql_query("DELETE FROM IPListItem WHERE IPListID = '$deleted'");
			mysql_query("DELETE FROM IPListIndex WHERE IndexListID = '$deleted'");
			mysql_close();
			echo "\t...DONE!\n";
		?>
	</body>
</html>
	
