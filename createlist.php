<html>
	<head>
		<?
			include("style.css");
			include("passwordz.php");
			mysql_connect(localhost,$username,$password);
			@mysql_select_db($database) or die("unable to connect to sql database");
		
			$query = "SELECT * FROM IPListIndex"; 
			$result = mysql_query($query) or die(mysql_error());
		?>
		<title>Manage SCC IP Lists</title>
	</head>
	<body>
		<h1>Create New IP List</h1>");
		<form action = "createnewlist.php" method = "post">
			<p>Default IP Octet 1:<input type="text" name="defipoct1"> (3 digit integer)<br>
			Default IP Octet 2:<input type="text" name="defipoct2"> (3 digit integer)<br>
			Default IP Octet 3:<input type="text" name="defipoct3"> (3 digit integer)<br>
			Default Subnet Mask IP:<input type="text" name="defsubnetip">(18 character string)<br>
			Table Header/Title:<input type="text" name="deflisttitle">(256 character string)<br>
			Table name:<input type="text" name="deflistname">(16 character string)
		<input type="submit" value="Submit"></form>
	
		<?
			echo "<h1>Delete IP List</h1>\n";
			echo "<form name=\"deletelist\" action=\"deletelist.php\" method=\"post\"\n>",
			"<select name=\"table\">\n";
			while($row = mysql_fetch_array($result)) {
				echo "\t<option value=\"", $row['IndexListID'], "\">", $row['IndexListTitle'], "</option>\n";
			}
			mysql_close();
		?>
		</select>
			<input type="submit" value="Delete List"></form>
	</body>
<html>
