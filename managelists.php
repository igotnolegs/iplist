<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<?
		include("style.css");
		include("passwordz.php");
		mysql_connect(localhost,$username,$password);
		@mysql_select_db($database) or die("unable to connect to sql database");
		$query = "SELECT * FROM IPListIndex ORDER BY IndexListTitle"; 
		$result = mysql_query($query) or die(mysql_error());
	?>
	<title>Manage SCC IP Lists</title>
	</head>
	<body>
		<table border="0" cellpadding="5" cellspacing="2">
			<tr class="head">
				<td><h2>Create New IP List</h2></td>
				<td><h2>Delete IP List</h2></td>
			</tr>
			<tr class="alt-one">
				<td>
					<form action = "createnewlist.php" method = "post">
						<p>Default IP Octet 1:<input type=	"text" name="defipoct1">	(3 digit integer)<br>
						Default IP Octet 2:<input type=		  "text" name="defipoct2">	(3 digit integer)<br>
						Default IP Octet 3:<input type=	  	"text" name="defipoct3">	(3 digit integer)<br>
						Default Subnet Mask IP:<input type=	"text" name="defsubnetip">	(18 character string)<br>
						Table Header/Title:<input type=	  	"text" name="deflisttitle">	(256 character string)<br>
						Table name:<input type=			       	"text" name="deflistname">	(16 character string)
						<input type=			            			"submit" value="Submit">
					</form>
				</td>
				<td>
<!-- -->
					<?
						echo "\t\t\t\t<form name=\"deletelist\" action=\"deletelist.php\" method=\"post\">\n",
						"\t\t\t\t\t<select name=\"deletelist\">\n";
						while($row = mysql_fetch_array($result)) {
							echo "\t\t\t\t\t\t<option value=\"", $row['IndexListID'], "\">", $row['IndexListTitle'], "</option>\n";
						}
						mysql_close();
					?>
<!-- -->
					</select>
						<input type="submit" value="Delete List"></form>
				</td>
			</tr>
		</table>
	</body>
<html>

		
		
		
