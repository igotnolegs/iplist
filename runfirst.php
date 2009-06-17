<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Refresh" content="2; url=index.php; text/html; charset=iso-8859-1">
		<title>IP LIST RUNFIRST</title>
	</head>
	<body>
		<?
			include("passwordz.php");
			mysql_connect(localhost,$username,$password);
			@mysql_select_db($database) or die("unable to connect to sql database");
		
			$query1="CREATE TABLE IPListItem(
				IPNumID 			  int(6) 			  NOT NULL auto_increment PRIMARY KEY,
				IPListOct1 		  int(3) 			  NOT NULL,
				IPListOct2		  int(3) 			  NOT NULL,
				IPListOct3	  	int(3) 			  NOT NULL,
				IPListOct4	  	int(3) 			  NOT NULL,
				IPListSNMask  	varchar(18) 	NOT NULL,
				IPListCustname	varchar(256) 	NOT NULL,
				IPListID		    varchar(16)		NOT NULL,
				IPListTitle	  	varchar(256)	NOT NULL,
				IPListTower		  varchar(64)		NOT NULL,
				IPListYDI	    	varchar(64)		NOT NULL)";
			$query2="CREATE TABLE IPListIndex(
				IndexNumID		  int(6)  			NOT NULL auto_increment PRIMARY KEY,
				IndexListID		  varchar(16)		NOT NULL,
				IndexListTitle	varchar(256)	NOT NULL)";
			mysql_query($query1);
			mysql_query($query2);
			echo "DONE!\n";
		?>
	</body>
</html>
		
		
