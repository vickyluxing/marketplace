 <?php
				   // delete single record in the table
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    if(isset($_POST['id']))
    {
	$dbh=mysql_connect ("localhost", "root", "CMPE281")
    or die ('I cannot connect to the database.');
    mysql_select_db ("marketplace");
    $id = mysql_real_escape_string($_POST['id']);
    $sql = mysql_query("DELETE FROM users WHERE UserID ='$id'");
    if(!$sql)
    {
        echo ("Could not delete rows" .mysql_error());
    }
    }
	}
	header("Location: userList.php"); 
?>