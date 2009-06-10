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
			echo '<title>EDIT SCC IP LIST:' . $header[2] . '</title>';
		?>
	</head>
	<body>
		<?
			echo'<small><a href="index.php" align="right">Go back to index</a></small><br>
			<form action="ipreadlist.php" method="get" name="list">
			<input type="hidden" name="list" VALUE="' .$tableselection . '">
			<input type="submit" value="Read this list"></form>';
		?>
		<?
			echo '<h1>Editing list: ' . $header[2] . '</h1>';
		?>
		<?
			$query = "SELECT * FROM IPListItem WHERE IPListID='$tableselection' ORDER BY IPListOct4";
	 		$result = mysql_query($query) or die(mysql_error());
		?>
		<form action="iplistsubmit.php" method="post"> 
			<input type="submit" value="Submit">
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
							<td width="140">
								<input type="hidden" name="listid[]" VALUE="' . $row['IPNumID'] . '">
								<input type="text" name="ipoct1[]" style="width:20px" value="' . $row['IPListOct1'] . '">	.
								<input type="text" name="ipoct2[]" style="width:20px" value="' . $row['IPListOct2'] . '">	.
								<input type="text" name="ipoct3[]" style="width:20px" value="' . $row['IPListOct3'] . '">	.
								<b>' . $row['IPListOct4'] . '</b>
							</td>
							<td width="50"><input type="text" name="subnetip[]" value="' . $row['IPListSNMask'] . '"></td>
							<td><input type="text" name="custname[]" value="' . $row['IPListCustname'] . '"></td>
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
