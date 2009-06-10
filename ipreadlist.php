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
			echo '<title>SCC IP LIST:' . $header[2] . '</title>';
		?>
	</head>
	<body>
		<?
			echo'<small><a href="index.php" align="right">Go back to index</a></small><br>
			<form action="ipeditlist.php" method="get" name="list">
				<input type="hidden" name="list" VALUE="' .$tableselection . '">
			<input type="submit" value="Edit this list"></form>';
			echo '<h1>' . $header[2] . '</h1>';
		
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
		<?
			while($row = mysql_fetch_array($result)) {
				$alt_row = ((($i++ % 2) == 1) ? 'alt-one' : 'alt-two');
				echo '<tr class="' . $alt_row . '">
					<td width="135">
					' . $row['IPListOct1'] . '.
					' . $row['IPListOct2'] . '.
					' . $row['IPListOct3'] . '.
					<b>' . $row['IPListOct4'] . '</b>
					</td>
					<td width="50">' . $row['IPListSNMask'] . '</td>
					<td width="200">' . $row['IPListCustname'] . '</td>
					<td>' . $row['IPListTower'] . '</td>
					<td>' . $row['IPListYDI'] . '</td>
				</tr>';
			}
			echo '</table>';
			mysql_close();
		?>		
	</body>
</html>
