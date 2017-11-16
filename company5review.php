<?php

    $dbh=mysql_connect ("localhost", "root", "CMPE281")
    or die ('I cannot connect to the database.');
    mysql_select_db ("marketplace");
    $result = mysql_query( "SELECT productid, ratetotal, ratenum FROM ratings WHERE productid = 101 or productid = 102 or productid = 103 or productid = 104 or productid = 105 or productid = 106 or productid = 107 or productid = 108 or productid = 109 or productid = 110");
    $product1 = array();
    while ($row = mysql_fetch_array($result, MYSQL_NUM))
        $product1[] = $row;

    $result = mysql_query( "SELECT productid, ratetotal, ratenum FROM ratings WHERE productid = 201 or productid = 202 or productid = 203 or productid = 204 or productid = 205 or productid = 206 or productid = 207 or productid = 208 or productid = 209 or productid = 210");
    $product2 = array();
    while ($row = mysql_fetch_array($result, MYSQL_NUM))
        $product2[] = $row;

    $result = mysql_query( "SELECT productid, ratetotal, ratenum FROM ratings WHERE productid = 301 or productid = 302 or productid = 303 or productid = 304 or productid = 305 or productid = 306 or productid = 307 or productid = 308 or productid = 309 or productid = 310");
    $product3 = array();
    while ($row = mysql_fetch_array($result, MYSQL_NUM))
        $product3[] = $row;

    $result = mysql_query( "SELECT productid, ratetotal, ratenum FROM ratings WHERE productid = 401 or productid = 402 or productid = 403 or productid = 404 or productid = 405 or productid = 406 or productid = 407 or productid = 408 or productid = 409 or productid = 410");
    $product4 = array();
    while ($row = mysql_fetch_array($result, MYSQL_NUM))
        $product4[] = $row;

    $result = mysql_query( "SELECT productid, ratetotal, ratenum FROM ratings WHERE productid = 501 or productid = 502 or productid = 503 or productid = 504 or productid = 505 or productid = 506 or productid = 507 or productid = 508 or productid = 509 or productid = 510");
    $product5 = array();
    while ($row = mysql_fetch_array($result, MYSQL_NUM))
        $product5[] = $row;

    //mysql_close($dbh);
    $newrate = array();


    $arrlength=count($product1);
    for($x = 0; $x < $arrlength; $x++){
        $rate = $product1[$x];
        $rate[1]=$rate[1]/$rate[2];
        $newrate += array($rate[0]=> $rate[1]);
    }

    arsort($newrate);
    $key_array = array_keys($newrate);
    $ch = curl_init("http://chuyuany.com/getproducts.php");    
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $product_array1 = unserialize(base64_decode($result));
    for($x = 0; $x < 5; $x++){
        //$company_id = floor($key_array[$x]/100);
        $mod = $key_array[$x]%100 - 1;
        if ($mod >= 0) {
            for($j=0;$j<=6;$j++){
                $product_array_1[$x][$j]=$product_array1[$mod][$j];
            }
        }
    }

    $newrate = array();

    $arrlength=count($product2);
    for($x = 0; $x < $arrlength; $x++){
        $rate = $product2[$x];
        $rate[1]=$rate[1]/$rate[2];
        $newrate += array($rate[0]=> $rate[1]);
    }
    //print_r(array_keys($newrate));

    arsort($newrate);
    $key_array = array_keys($newrate);
    $ch = curl_init("http://look4helper.com/getproducts.php");    
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $product_array2 = unserialize(base64_decode($result));
    for($x = 0; $x < 5; $x++){
        //$company_id = floor($key_array[$x]/100);
        $mod = $key_array[$x]%100 - 1;
        if ($mod >= 0) {
            for($j=0;$j<=6;$j++){
                $product_array_2[$x][$j]=$product_array2[$mod][$j];
            }
        }
    }

    $newrate = array();

    $arrlength=count($product3);
    for($x = 0; $x < $arrlength; $x++){
        $rate = $product3[$x];
        $rate[1]=$rate[1]/$rate[2];
        $newrate += array($rate[0]=> $rate[1]);
    }
    //print_r(array_keys($newrate));

    arsort($newrate);
    $key_array = array_keys($newrate);
    $ch = curl_init("http://kitkavicky.com/getproducts.php");    
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $product_array3 = unserialize(base64_decode($result));
    for($x = 0; $x < 5; $x++){
        //$company_id = floor($key_array[$x]/100);
        $mod = $key_array[$x]%100 - 1;
        if ($mod >= 0) {
            for($j=0;$j<=6;$j++){
                $product_array_3[$x][$j]=$product_array3[$mod][$j];
            }
        }
    }

    $newrate = array();

    $arrlength=count($product4);
    for($x = 0; $x < $arrlength; $x++){
        $rate = $product4[$x];
        $rate[1]=$rate[1]/$rate[2];
        $newrate += array($rate[0]=> $rate[1]);
    }
    //print_r(array_keys($newrate));

    arsort($newrate);
    $key_array = array_keys($newrate);
    $ch = curl_init("http://sheraton-departures.000webhostapp.com/getproducts.php");    
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $product_array4 = unserialize(base64_decode($result));
    for($x = 0; $x < 5; $x++){
        //$company_id = floor($key_array[$x]/100);
        $mod = $key_array[$x]%100 - 1;
        if ($mod >= 0) {
            for($j=0;$j<=6;$j++){
                $product_array_4[$x][$j]=$product_array4[$mod][$j];
            }
        }
    }

    $newrate = array();

    $arrlength=count($product5);
    for($x = 0; $x < $arrlength; $x++){
        $rate = $product5[$x];
        $rate[1]=$rate[1]/$rate[2];
        $newrate += array($rate[0]=> $rate[1]);
    }
    //print_r(array_keys($newrate));

    arsort($newrate);
    $key_array = array_keys($newrate);
    $ch = curl_init("http://daisydanlu.info/getproducts.php");    
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $product_array5 = unserialize(base64_decode($result));
    for($x = 0; $x < 5; $x++){
        //$company_id = floor($key_array[$x]/100);
        $mod = $key_array[$x]%100 - 1;
        if ($mod >= 0) {
            for($j=0;$j<=6;$j++){
                $product_array_5[$x][$j]=$product_array5[$mod][$j];
            }
        }
    }
    
?>


<?php include 'header.php';?>


    <div class="jumbotron feature">
        <div class="container">
            <h1><span class="glyphicon glyphicon-knight"></span> Best Reviewed Products in Member Companies</h1>
        </div>
    </div>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <h1><span class="glyphicon glyphicon-knight"></span> Ms.Brown's Best Reviewed Products</h1>
            
            <div class="col-md-10">

            <?php 
                foreach($product_array_1 as $index => $product) {
                    if($index % 3 == 2) echo '<div class="row">';
            ?>
                        <a href="<?php echo $product[6] ?>">
                        <div class="col-sm-4 col-lg-4 col-md-3">
                            <div class="thumbnail">
                                <img src="<?php echo $product[2] ?>" alt="">
                                <div class="caption">
                                    <h4 class="pull-right"><?php echo "$". $product[4] ?></h4>
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



        <div class="row">

            <h1><span class="glyphicon glyphicon-knight"></span> Doll Shop Best Reviewed Products</h1>
            
            <div class="col-md-10">

            <?php 
                foreach($product_array_2 as $index => $product) {
                    if($index % 3 == 2) echo '<div class="row">';
            ?>
                        <a href="<?php echo $product[6] ?>">
                        <div class="col-sm-4 col-lg-4 col-md-3">
                            <div class="thumbnail">
                                <img src="<?php echo $product[2] ?>" alt="">
                                <div class="caption">
                                    <h4 class="pull-right"><?php echo "$". $product[4] ?></h4>
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

        <div class="row">

            <h1><span class="glyphicon glyphicon-knight"></span> Kitka Best Reviewed Products</h1>
            
            <div class="col-md-10">

            <?php 
                foreach($product_array_3 as $index => $product) {
                    if($index % 3 == 2) echo '<div class="row">';
            ?>
                        <a href="<?php echo $product[6] ?>">
                        <div class="col-sm-4 col-lg-4 col-md-3">
                            <div class="thumbnail">
                                <img src="<?php echo $product[2] ?>" alt="">
                                <div class="caption">
                                    <h4 class="pull-right"><?php echo "$". $product[4] ?></h4>
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



        <div class="row">

            <h1><span class="glyphicon glyphicon-knight"></span> FLUIGENT Best Reviewed Products</h1>
            
            <div class="col-md-10">

            <?php 
                foreach($product_array_4 as $index => $product) {
                    if($index % 3 == 2) echo '<div class="row">';
            ?>
                        <a href="<?php echo $product[6] ?>">
                        <div class="col-sm-4 col-lg-4 col-md-3">
                            <div class="thumbnail">
                                <img src="<?php echo $product[2] ?>" alt="">
                                <div class="caption">
                                    <h4 class="pull-right"><?php echo "$". $product[4] ?></h4>
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



        <div class="row">

            <h1><span class="glyphicon glyphicon-knight"></span> Daisydanlu Best Reviewed Products</h1>
            
            <div class="col-md-10">

            <?php 
                foreach($product_array_5 as $index => $product) {
                    if($index % 3 == 2) echo '<div class="row">';
            ?>
                        <a href="<?php echo $product[6] ?>">
                        <div class="col-sm-4 col-lg-4 col-md-3">
                            <div class="thumbnail">
                                <img src="<?php echo $product[2] ?>" alt="">
                                <div class="caption">
                                    <h4 class="pull-right"><?php echo "$". $product[4] ?></h4>
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