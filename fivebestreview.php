<?php

    $dbh=mysql_connect ("localhost", "root", "CMPE281")
    or die ('I cannot connect to the database.');
    mysql_select_db ("marketplace");

    $query = "SELECT ProductID, SUM(Rating), COUNT(*) FROM review GROUP BY ProductID";
    $result = mysql_query($query);
    $product = array();
    while ($row = mysql_fetch_array($result, MYSQL_NUM))
        $product[] = $row;
        //print_r(array_values($product_array)); 
    mysql_close($dbh);
    $newrate = array();
    $arrlength=count($product);
    for($x = 0; $x < $arrlength; $x++){
        $rate = $product[$x];
        $rate[1]=$rate[1]/$rate[2];
        $newrate += array($rate[0]=> $rate[1]);
    }
    //print_r(array_keys($newrate));
    arsort($newrate);
    $key_array = array_keys($newrate);
    for($x = 0; $x < 5; $x++){
        $company_id = floor($key_array[$x]/100);
        $mod = $key_array[$x]%100 - 1;
        switch ($company_id) {
            case 1:
                $ch = curl_init("http://chuyuany.com/getproducts.php");
                break;
            case 2:
                $ch = curl_init("http://look4helper.com/getproducts.php");
                break;
            case 3:
                $ch = curl_init("http://kitkavicky.com/getproducts.php");
                break;
            case 4:
                $ch = curl_init("http://sheraton-departures.000webhostapp.com/getproducts.php");
                break;
             case 5:
                $ch = curl_init("http://daisydanlu.info/getproducts.php");
                break;           
            default:
                break;         
        }
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        $product_array1 = unserialize(base64_decode($result));

	if ($mod >= 0) {
        //echo "<h4>".$product_array[$mod][0].",".$product_array[$mod][1].",".$product_array[$mod][2].",".$product_array[$mod][6]."</h4>";
            for($j=0;$j<=6;$j++){
                $product_array[$x][$j]=$product_array1[$mod][$j];
            }

        }
    }

?>



<?php include 'header.php';?>


    <div class="jumbotron feature">
        <div class="container">
            <h1><span class="glyphicon glyphicon-knight"></span> Top 5 Best Reviewed Products</h1>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            
            <div class="col-md-10">

            <?php 
                foreach($product_array as $index => $product) {
                    if($index % 3 == 2) echo '<div class="row">';
            ?>
                        <a href="<?php echo $product[6] ?>">
                        <div class="col-sm-4 col-lg-4 col-md-3">
                            <div class="thumbnail">
                                <img src="<?php echo $product[2] ?>" alt="">
                                <div class="caption">
                                    <h4 class="pull-right"><?php echo "$" . $product[4] ?></h4>
                                    <h4><?php echo $product[1] ?></a>
                                    </h4>
                                    <p><?php echo $product[3] ?></p>
                                </div>
				                <div class="ratings">      
                                    <p>
                                    <?php 
                                        $dbh=mysql_connect ("localhost", "root", "CMPE281")
                                        or die ('I cannot connect to the database.');
                                        mysql_select_db ("marketplace");
                                        $result = mysql_query("SELECT ratetotal, ratenum FROM ratings WHERE productid = ".$product[0]);
                                        $data = mysql_fetch_array($result, MYSQL_NUM);
                                        echo mysql_error();
                                        if(!$data)
                                            $stars = 0;
                                        else 
                                            $stars = intval($data[0]) / intval($data[1]);
                                        for($i = 1; $i <= round($stars); $i++)
                                            echo '<span class="glyphicon glyphicon-star"></span>';
                                        for($i = round($stars)+1; $i <= 5; $i++)
                                            echo '<span class="glyphicon glyphicon-star-empty"></span>';
                                        echo '&nbsp;&nbsp;&nbsp;'.round($stars, 1);
                                    ?>
                                    </p>

                                </div>
                            </div>
                        </div>
            <?php 
                    if($index % 3 == 2)    echo '</div>';
                }
            ?>
                
            </div>   

        </div>
    </div>           

    <!-- /.container -->

    
    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <!-- IE10 viewport bug workaround -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
    <!-- Placeholder Images -->
    <script src="js/holder.min.js"></script>
    
</body>

</html>
