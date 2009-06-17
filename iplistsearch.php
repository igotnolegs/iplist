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
		echo "<title>SCC IP LIST SEARCH:", $searchquery, "</title>\n";
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
  <table border="0" cellpadding="5" cellspacing="2">
	  <tr class="head">
		  <td><b>List Title</b></td>
		  <td><b>IP Address</b></td>
		  <td><b>Subnet Mask</b></td>
		  <td><b>Customer Name</b></td>
		  <td><b>Tower</b></td>
		  <td><b>YDI</b></td>
	  </tr>			
<!-- -=-=-=-=-=IP ADDRESS TABLE STARTS HERE-=-=-=-=-= -->
   	<?			
			while($row = mysql_fetch_array($result)) {
				$alt_row = ((($i++ % 2) == 1) ? 'alt-one' : 'alt-two');
				echo "<tr class=\"", $alt_row, "\">\n",
					"\t<td>", $row['IPListTitle'], "</td>\n",
					"\t<td width=\"135\">",
					$row['IPListOct1'], ".",
					$row['IPListOct2'], ".",
					$row['IPListOct3'], ".",
			    "<b>", $row['IPListOct4'], "&nbsp</b></td>\n",
					"\t<td width=\"50\">", $row['IPListSNMask'], "&nbsp</td>\n",
					"\t<td width=\"135\">", $row['IPListCustname'], "&nbsp</td>\n",
					"\t<td>", $row['IPListTower'], "&nbsp</td>\n",
					"\t<td>", $row['IPListYDI'], "&nbsp</td>\n",
				"</tr>\n";
			}
			echo "</table>\n";
			mysql_close();
		?>		
<!-- -=-=-=-=-=IP ADDRESS TABLE ENDS HERE-=-=-=-=-= -->
    </body>
</html>
