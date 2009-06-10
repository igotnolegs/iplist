<html>
	<head>
		<title>SCC IP List Index</title>
		<?
			include("style.css");
			include("passwordz.php");
			mysql_connect(localhost,$username,$password);
			@mysql_select_db($database) or die("unable to connect to sql database");
		
			$query = "SELECT * FROM IPListIndex ORDER BY IndexListTitle"; 
			$result = mysql_query($query) or die(mysql_error());
		?>
	</head>
	<body>
		<table border="0" cellpadding="5" cellspacing="1">
			<tr class="head">
				<td>
					<h2>SCC IP List Selection</h2>
				</td>
				<td>
					<h2>Search by customer name<h2>
				</td>
			</tr>
			<tr class="alt-one">				
				<td>
					<form name="list" action="ipreadlist.php" method="get">
					<select name="list">
					<?
						while($row = mysql_fetch_array($result)) {
								echo '<option value="' . $row['IndexListID'] . '">' . $row['IndexListTitle'] . '</option>';
						}
						mysql_close();
					?>
					<input type="submit" value="Submit"></form></select>
				</td>
				<td>
				<form name="search" action="iplistsearch.php" method="get">
					<input type="text" name="search" value="">
					<input type="submit" value="Search">
				</form>
				</td>
			</tr>
		</table>
	</body>
</html>
