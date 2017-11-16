
<?php 
//import $produc_array variables
require_once('curlAllProducts.php');?>

<?php include 'header.php';?>

<style>
	table {
    width:70%;
	background-color:aliceblue;
		table-layout: fixed;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
	.title{
		font-size: 24px;
		color:darkblue;
	}
.tables{
	padding-left: 30px;
	}
</style>

<div class="container">
            <h2><span class="glyphicon glyphicon-knight"></span>Top 5 viewed products:</h2>
</div>

<div class="tables">
<?php 
			$TOP = 5;
			$visitData =array();
            foreach($product_array as $index => $product) {
					$visitData+=array($product[1] => $product[5]);
			}
			arsort($visitData);
?>
			<table>
				<caption class="title">Entire Marketplace</caption>
				<tr>
					<th width = "70%">Product Name</th>
					<th width = "30%">Viewed Number</th>
				</tr>
			
			<?php 
				$i = 0;
				foreach ($visitData as $productName => $num){
					$i++; ?>
			<tr>
			 <th width = "70%"> <?php echo $productName;?></th>
			 <th width = "30%"> <?php echo $num; ?> </th>
			</tr>
			<?php if ($i == 5) break;} ?>
			
			</table>	
</div>


<div class="container">
            <h2><span class="glyphicon glyphicon-knight"></span>Top 5 viewed products from each company:</h2>
</div>
<div class="tables">
<?php 
			$TOP = 5;
			for ($j = 0; $j < 5; $j++) {
			$visitData =array();
            foreach($company[$j] as $index => $product) {
					$visitData+=array($product[1] => $product[5]);
			}
			arsort($visitData);
?>
			<table>
				<caption class="title"><?php echo $companyName[$j] ?></caption>
				<tr>
					<th width = "70%">Product Name</th>
					<th width = "30%">Viewed Number</th>
				</tr>
			
			<?php 
				$i = 0;
				foreach ($visitData as $productName => $num){
					$i++; ?>
			<tr>
			 <th width = "70%"> <?php echo $productName;?></th>
			 <th width = "30%"> <?php echo $num; ?> </th>
			</tr>
			<?php if ($i == 5) break;} ?>
			
			</table>	
			<?php } ?>

</div>