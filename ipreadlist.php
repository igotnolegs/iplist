<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?
		include("style.css");
		include("passwordz.php");
		mysql_connect(localhost,$username,$password);
		@mysql_select_db($database) or die("unable to connect to sql database");
		$tableselection = $_GET['list'];
		$header = mysql_fetch_array(mysql_query("SELECT * FROM IPListIndex WHERE IndexListID = '$tableselection'"));
		echo "<title>SCC IP LIST: ", $header[2], "</title>\n";
	?>
	</head>
	<body>
		<?
			echo "<small><a href=\"index.php\" align=\"right\">Go back to index</a></small><br>\n",
			"\t<form action=\"ipeditlist.php\" method=\"get\" name=\"list\">\n",
				"\t\t<input type=\"hidden\" name=\"list\" VALUE=\"", $tableselection, "\">\n",
			"\t<input type=\"submit\" value=\"Edit this list\"></form>\n";
			echo "\t<h1>", $header[2], "</h1>\n";
		
			$query = "SELECT * FROM IPListItem WHERE IPListID='$tableselection' ORDER BY IPListOct4";
	 		$result = mysql_query($query) or die(mysql_error());
		?>
	<table border="0" cellpadding="5" cellspacing="2">
		<tr class="head">
			<td><b>IP Address</b></td>
      <td><b>Subnet Mask</b></td>
      <td><b>Customer Name</b></td>
      <td><b>Tower</b></td>
      <td><b>YDI</b></td>
		</tr>
<!-- _=_=_=_=_=IP ADDRESS TABLE STARTS HERE_=_=_=_=_= -->
		<?
			while($row = mysql_fetch_array($result)) {
				$alt_row = ((($i++ % 2) == 1) ? 'alt-one' : 'alt-two');
				echo "<tr class=\"", $alt_row, "\">\n",
          "\t<td width=\"100\">",
					$row['IPListOct1'],  ".",
					$row['IPListOct2'],  ".",
					$row['IPListOct3'],  ".",
					"<b>", $row['IPListOct4'], "</b>&nbsp</td>\n",
          "\t<td width=\"50\">", $row['IPListSNMask'], "&nbsp</td>\n",
					"\t<td width=\"200\">", $row['IPListCustname'], "&nbsp</td>\n",
					"\t<td>", $row['IPListTower'], "&nbsp</td>\n",
					"\t<td>", $row['IPListYDI'], "&nbsp</td>\n",
				"</tr>\n";
			}
			echo "</table>";
			mysql_close();
		?>		
<!-- _=_=_=_=_=IP ADDRESS TABLE ENDS HERE_=_=_=_=_= -->
    </body>
</html>
