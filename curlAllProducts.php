<?php


    $ch = curl_init("http://chuyuany.com/getproducts.php");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $product_array1 = unserialize(base64_decode($result));
    
    $ch = curl_init("http://kitkavicky.com/getproducts.php");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $product_array2 = unserialize(base64_decode($result));

    $ch = curl_init("http://daisydanlu.info/getproducts.php");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $product_array3 = unserialize(base64_decode($result));


    $ch = curl_init("http://sheraton-departures.000webhostapp.com/getproducts.php");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $product_array4 = unserialize(base64_decode($result));

    $ch = curl_init("http://look4helper.com/getproducts.php");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    $product_array5 = unserialize(base64_decode($result));

    $product_array = array_merge($product_array1,$product_array2, $product_array3, $product_array4, $product_array5);

	$company = array($product_array1, $product_array2, $product_array3, $product_array4, $product_array5);
	$companyName = array("Ms.Brown's", "kitka", "daisydanlu", "FLUIGENT", "Doll Shop");
?>