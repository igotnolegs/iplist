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
			echo '<title>SCC IP LIST SEARCH:"' . $searchquery . '"</title>';
		?>
	</head>
	<body>
		<?
			echo '<small><a href="index.php" align="right">Go back to index</a></small><br>
			<form action="iplistsearch.php" method="get" name="search">
				<input type="hidden" name="search" VALUE="' . $searchquery . '">
			<input type="submit" value="View search results"></form>';

			echo '<h2>Search results for "' . $searchquery . '":</h2><br>';
		
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
		<?			
			while($row = mysql_fetch_array($result)) {
				$alt_row = ((($i++ % 2) == 1) ? 'alt-one' : 'alt-two');
				echo '<tr class="' . $alt_row . '">
					<input type="hidden" name="listid[]" VALUE="' . $row['IPNumID'] . '">
					<td>' . $row['IPListTitle'] . '</td>
					<td width="135">
						<input type="text" name="ipoct1[]" style="width:20px" value="' . $row['IPListOct1'] . '">.
						<input type="text" name="ipoct2[]" style="width:20px" value="' . $row['IPListOct2'] . '">.
						<input type="text" name="ipoct3[]" style="width:20px" value="' . $row['IPListOct3'] . '">.
						<b>' . $row['IPListOct4'] . '</b>
					</td>
					<td width="50"><input type="text" name="subnetip[]" value="' . $row['IPListSNMask'] . '"></td>
					<td width="135"><input type="text" name="custname[]" value="' . $row['IPListCustname'] . '"></td>
					<td><input type="text" name="tower[]" value="' . $row['IPListTower'] . '"></td>
					<td><input type="text" name="ydiname[]" value="' . $row['IPListYDI'] . '"></td>
				</tr>';
			}
			echo '</table>';
			mysql_close();
		?>
		<input type="submit" value="Submit">
		</form>	
	</body>
</html>