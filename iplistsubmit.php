<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Refresh" content="2; url=index.php; text/html; charset=iso-8859-1">
    <title>Submitting changes...</title>
	</head>
	<?
		include("style.css");
		include("passwordz.php");
		mysql_connect(localhost,$username,$password);
		@mysql_select_db($database) or die("unable to connect to sql database");//connect to sql database
	
		$tableselection = $_POST['tablesubmit'];
		$tablename =      $tableselection;
		$listid =         $_POST['listid'];
		$ipoct1 =         $_POST['ipoct1'];
		$ipoct2 =         $_POST['ipoct2'];
		$ipoct3 =         $_POST['ipoct3'];
		$subnetip =       $_POST['subnetip'];
		$custname =       $_POST['custname'];
		$tower =          $_POST['tower'];
		$ydiname =        $_POST['ydiname'];
		for(;
		list(, $listidNotAnArray ) =    each( $listid ) ,
		list(, $ipoct1NotAnArray ) =    each( $ipoct1 ) ,
		list(, $ipoct2NotAnArray ) =    each( $ipoct2 ) ,
		list(, $ipoct3NotAnArray ) =    each( $ipoct3 ) ,
		list(, $subnetipNotAnArray ) =  each( $subnetip ) ,
		list(, $custnameNotAnArray ) =  each( $custname ) ,
		list(, $towerNotAnArray ) =     each( $tower ) ,
		list(, $ydinameNotAnArray ) =   each( $ydiname );) {
			mysql_query("UPDATE IPListItem SET 
				IPListOct1 = 	    '$ipoct1NotAnArray', 
				IPListOct2 = 	    '$ipoct2NotAnArray', 
				IPListOct3 = 	    '$ipoct3NotAnArray', 
				IPListSNMask = 	  '$subnetipNotAnArray', 
				IPListCustname =  '$custnameNotAnArray', 
				IPListTower = 	  '$towerNotAnArray', 
				IPListYDI = 	    '$ydinameNotAnArray' 
				WHERE 
				IPNumID = 	      '$listidNotAnArray'");
		}
		echo "<b>DONE!</b> Returning to index...\n";
		mysql_close();	
	?>
</html>
