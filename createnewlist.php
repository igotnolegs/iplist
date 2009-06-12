<html>
	<head>
	<meta http-equiv="Refresh" content="2; url=index.php">
	<?
		include("style.css");
	?>
	</head>
	<body>
		<?
			include("passwordz.php");
			mysql_connect(localhost,$username,$password);
			@mysql_select_db($database) or die("unable to connect to sql database");
		
			$i = -1;
			$f = 255;
		
			$createipoct1 = 	  $_POST['defipoct1'];
			$createipoct2 = 	  $_POST['defipoct2'];
			$createipoct3 = 	  $_POST['defipoct3'];
			$createsubnetip = 	$_POST['defsubnetip'];
			$createlisttitle = 	$_POST['deflisttitle'];
			$createlistname = 	$_POST['deflistname'];
		
			echo '<title>Creating list ' . $createlisttitle . '</title>\n';
		
			$query1="INSERT INTO IPListIndex (
				IndexListID, 
				IndexListTitle
			) 
			VALUES (
				'$createlistname',
				'$createlisttitle'
			)";
			mysql_query($query1);
			mysql_query($query2);
			while ($i < $f) {
				++$i;
				mysql_query("INSERT INTO IPListItem (
					IPListOct1, 
					IPListOct2,
					IPListOct3,
					IPListOct4,
					IPListSNMask,
					IPListID,
					IPListTitle
				) 
				VALUES (
					'$createipoct1',
					'$createipoct2',
					'$createipoct3',
					'$i',
					'$createsubnetip',
					'$createlistname',
					'$createlisttitle'
				)
				");
			}
			mysql_close();
			echo "DONE!\n";
			?>
		</body>
</html>
