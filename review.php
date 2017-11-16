<?php
	$dbh=mysql_connect ("localhost", "root", "CMPE281")
	or die ('I cannot connect to the database.');
	mysql_select_db ("marketplace");

	if($_POST["action"] == "getreviews") {
		$query = "SELECT * FROM review WHERE ProductID = ".$_POST["pid"];
		$result = mysql_query($query);
		$reviews = array();
		while ($row = mysql_fetch_array($result, MYSQL_NUM))
			$reviews[] = $row;

		//var_dump($reviews);
		echo json_encode($reviews);
	}
	else if($_POST["action"] == "submitreview") {
		$query = "INSERT INTO review (ProductID, UserName, Rating, Review) VALUES ('".$_POST["pid"]."', '".$_POST["uname"]."', '".$_POST["rating"]."', '".$_POST["review"]."')";
		mysql_query($query);

		$result = mysql_query("SELECT * FROM ratings WHERE productid = ".$_POST["pid"]);
		if(mysql_num_rows($result) > 0)
			$query2 = "UPDATE ratings SET ratetotal = ratetotal + ".$_POST["rating"].", ratenum = ratenum + 1 WHERE productid = ".$_POST["pid"];
		else
			$query2 = "INSERT INTO ratings (productid, ratetotal, ratenum) VALUES ('".$_POST["pid"]."', '".$_POST["rating"]."', '1')";
		mysql_query($query2);
	}
?>