<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?
		include("style.css");
		include("passwordz.php");
		mysql_connect(localhost,$username,$password);
		@mysql_select_db($database) or die("unable to connect to sql database");
		$searchquery = $_GET['search'];
		echo "<title>SCC IP LIST SEARCH: ", $searchquery, "</title>\n";
	?>
	</head>
	<body>
		<?
			echo "<small><a href=\"index.php\" align=\"right\">Go back to index</a></small><br>\n",
			"\t<form action=\"iplistsearchedit.php\" method=\"get\" name=\"search\">\n",
				"\t\t<input type=\"hidden\" name=\"search\" VALUE=", $searchquery, ">\n",
			"\t<input type=\"submit\" value=\"Edit search results\"></form>\n";
			echo "\t<h2>Search results for ", $searchquery, "</h2><br>\n";
		
			$query = "SELECT * FROM IPListItem WHERE IPListCustname LIKE '%$searchquery%' ORDER BY IPListID, IPListCustname"; 
	 		$result = mysql_query($query) or die(mysql_error());
		?>
		<form action="iplistsubmit.php" method="post">
		<input type="submit" value="Submit">
		<table border="0" cellpadding="5" cellspacing="2">
			<tr class="head">
				<td><b>List Title</b></td>
				<td><b>IP Address</b></td>
				<td><b>Subnet Mask</b></td>
				<td><b>Customer Name</b></td>
				<td><b>Tower</b></td>
				<td><b>YDI</b></td>
			</tr>
<!-- -=-=-=-=-=IP ADDRESS EDIT FORM STARTS HERE-=-=-=-=-= --!>
		<?			
			while($row = mysql_fetch_array($result)) {
				$alt_row = ((($i++ % 2) == 1) ? 'alt-one' : 'alt-two');
				echo "<tr class=\"", $alt_row, "\">\n",
					"\t<input type=\"hidden\" name=\"listid[]\" VALUE=\"", $row['IPNumID'], "\">\n",
					"\t<td>", $row['IPListTitle'], "</td>\n",
					"\t<td width=\"135\">\n",
						"\t\t<input type=\"text\" name=\"ipoct1[]\" style=\"width:20px\" value=\"", $row['IPListOct1'], "\">.\n",
            "\t\t<input type=\"text\" name=\"ipoct1[]\" style=\"width:20px\" value=\"", $row['IPListOct2'], "\">.\n",
            "\t\t<input type=\"text\" name=\"ipoct1[]\" style=\"width:20px\" value=\"", $row['IPListOct3'], "\">.\n", 
						"\t\t<b>", $row['IPListOct4'], "</b>\n",
					"\t</td>\n",
					"\t<td width=\"50\"><input type=\"text\" name=\"subnetip[]\" value=\"", $row['IPListSNMask'], "\"></td>\n",
					"\t<td width=\"135\"><input type=\"text\" name=\"custname[]\" value=\"", $row['IPListCustname'], "\"></td>\n",
					"\t<td><input type=\"text\" name=\"tower[]\" value=\"", $row['IPListTower'], "\"></td>\n",
					"\t<td><input type=\"text\" name=\"ydiname[]\" value=\"", $row['IPListYDI'], "\"></td>\n",
				"</tr>\n";
			}
			echo "</table>\n";
			mysql_close();
		?>
<!-- -=-=-=-=-=IP ADDRESS EDIT FORM ENDS HERE-=-=-=-=-= --!>
		<input type="submit" value="Submit">
		</form>	
	</body>
</html>
