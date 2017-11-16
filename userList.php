<?php include 'header.php';?>
<style>
	table {
    width:70%;
	background-color:beige;
		table-layout: fixed;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
	padding-left: 5px;
    text-align: left;
}
	.title{
		font-size: 20px;
		color:darkblue;
	}
	.tables {
		padding-left: 30px;
	}

</style>

<div class="container">
            <h2><span class="glyphicon glyphicon-knight"></span>Welcome Admin:</h2>
</div>

<!--list all users-->
<?php

    $dbh=mysql_connect ("localhost", "root", "CMPE281")
    or die ('I cannot connect to the database.');
    mysql_select_db ("marketplace");

    $query = "SELECT * FROM users";
    $result = mysql_query($query);
    $users = array();
    while ($row = mysql_fetch_array($result, MYSQL_NUM))
        $users[] = $row;
?>
		<div class="tables">
			<table>
				<caption class="title">All Users of Marketplace</caption>
				<tr>
					<th width = "20%">UserID</th>
					<th width = "30%">User Name</th>
					<th width = "30%">Password</th>
					<th width = "20%">Action</th>
				</tr>
			
			<?php 
				foreach ($users as $index => $user){
					
				 ?>
			<tr>
			 <th width = "20%"> <?php echo $user[0];?></th> 
			 <th width = "30%"> <?php echo $user[1]; ?> </th>
			 <th width = "30%"> <?php echo $user[2]; ?> </th>
				<th width = "20%"> 
      				<form  method="post" action="delete.php">
       				 	<input type="hidden" name="id" value="<?php echo $user[0]; ?>">
        				<input type="image" src="image/delete.png" name="submit" width='15px' height='15px'>
   					 </form>
      				
      				
       				
   				 </th>
			</tr>

			<?php }?>
		  </table>
</div>		
	
		
	

