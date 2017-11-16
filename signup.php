   <?php
    // Start the session
    session_start();
    $insert_message = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "127.0.0.1";
        $username = "root";

        $password = "CMPE281";
        $dbname = "marketplace";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        if (!empty($_POST['create-new-user'])) {
                $user = $_POST["UserName"];  
                $psw = $_POST["Password"];  
                if($user == "" || $psw == "" || $user == "User Name*" || $psw == "Set a Password*" ) {  
                    echo "<script>alert('Please insert username or password！'); history.go(-1);</script>";  
                  }  
                else {
                    $sql = "SELECT UserName FROM users WHERE UserName='" . $_POST["UserName"] . "'";
                    $result = $conn->query($sql);
                    $num = mysqli_num_rows($result);
                    if($num){  
                      echo "<script>alert('Username is existent! Use another one!'); history.go(-1);</script>";           
                      }  
                    else {
                          $sql = "INSERT INTO users (UserName, Password)
                          VALUES ('" . $_POST["UserName"] .  "', '" . $_POST["Password"] . "')";

                          if ($conn->query($sql) === TRUE) {
                             echo "<script>alert('New user record created successfully!Please log in!'); history.go(-1);</script>";  
                              // $insert_message = "New user record created successfully!";
                          } else {
                            // echo "<script>alert('Error!'); history.go(-1);</script>";  
                              $insert_message = "Error: " . $sql . "<br>" . $conn->error;
                          }
                      }
                  }
                }
        $conn->close();
    }

    ?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Market</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style_1.css">

    
    
    
  </head>

   <div class="bg">
 </div>

    <div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="signup.php">Sign Up</a></li>
        <li class="tab"><a href="login.php">Log In</a></li>
      </ul>
        
        <div id="login">   
          <h1>Sign Up for Free</h1>
          
          <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">       
         <div class="field-wrap">
            <label>
              <!--User Name<span class="req">*</span>-->
            </label>
            <input type="VARCHAR" name="UserName" 
            onfocus="if(this.value =='User Name*') {this.value='';}" value = "User Name*">
          </div>
          
          
           <div class="field-wrap">
            <label>
              <!--Password<span class="req">*</span>-->
            </label>
             <input type="VARCHAR" name="Password"
             onfocus="if(this.value =='Set a Password*') {this.value='';}" value = "Set a Password*">
          </div>
          
          
         <!--  <button class="button button-block" />Sign Up</button> -->
         <input class="button button-block"  type="submit" name="create-new-user" value="Create">

          </form>
          <?php

           if(isset($insert_message)) {
            echo "<font size=\"3\">" . $insert_message . "</font><br><br>";
            }
            ?>


         



        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->

      
        <!-- jQuery -->
        <script src="js/jquery-1.11.3.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>
      
      <!-- IE10 viewport bug workaround -->
      <script src="js/ie10-viewport-bug-workaround.js"></script>
      
      <!-- Placeholder Images -->
      <script src="js/holder.min.js"></script>
      
    </body>

    
    
