<?php

session_start();

//Get last visited ProductID.
$product = $_GET['id'];

// Check user loggin.
if (isset($_SESSION["login_as"])) {

    // Connect to database
    $servername = "127.0.0.1";
    $username = "root";
    $password = "CMPE281";
    $dbname = "marketplace";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (mysqli_connect_errno()) {
        die("Connect failed: ". mysqli_connect_error());
    }

    // Get old visit history.
    $user = $_SESSION["login_as"];  
    $query = "SELECT VisitProductID FROM users WHERE UserName = '". $user ."'";
    $history = mysqli_query($conn, $query);
    if (!$history) {
        die("Query error: ". mysqli_error($conn));
    }
    $r = mysqli_fetch_array($history);
    $history_array = unserialize(base64_decode($r[0]));

    //Update visit history.
    $updated_array = array();
    array_push($updated_array, $product);
    $i = 1;
    foreach ($history_array as $p) {
        if ($p != $product) {
            array_push($updated_array, $p);
            $i++;
            if ($i == 10) {
                break;
            }
        }
    }
    $updated = base64_encode(serialize($updated_array));
    $query_update = "Update users set VisitProductID='" . $updated . "' WHERE UserName = '". $user ."'";
    $result = mysqli_query($conn, $query_update);
    if (!$result) {
        die("Query error: ". mysqli_error($conn));
    }

    //Close database.
    mysqli_close($conn);
}

//Go to product page.
header("Location: ". urldecode($_GET['url']));    
?>