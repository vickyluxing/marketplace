   <?php
    // Start the session
    session_start();
    $insert_message = null;
    $search_result = null;

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

        if(!empty($_POST['log-in']))  {  
          $user = $_POST["UserName"];  
          $psw = $_POST["Password"]; 
			
			//Wei add check for Admin
			if(!strcmp($user, 'ADMIN')&&!(strcmp($psw, 'admin'))) {header("Location: userList.php");}
			else {
			
          if($user == "" || $psw == "" || $user == "User Name*" || $psw == "Password*" ) {  
            echo "<script>alert('Please inser username or password！'); history.go(-1);</script>";  
            }  
          else  {   
            $sql = "SELECT UserName,Password FROM users WHERE UserName='" . $_POST["UserName"] . "' and Password='" . $_POST["Password"] . "'";
            $result = $conn->query($sql);
            $num = mysqli_num_rows($result);
            if($num){  
              $_SESSION["login_as"] = $user;
               header("Location: index.php"); 
               
 
              }  
              else  {  
                echo "<script>alert('Wrong login credentials！');history.go(-1);</script>";  
              }  
          } 
		}
        }
        else {  
            echo "<script>alert('Unsuccesful request！'); history.go(-1);</script>";  
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
        <li class="tab"><a href="signup.php">Sign Up</a></li>
        <li class="tab active"><a href="login.php">Log In</a></li>
      </ul>
        
        <div id="login">   
          <h1>Welcome Back!</h1>
          
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
             onfocus="if(this.value =='Password*') {this.value='';}" value = "Password*">
          </div>
          
          
          <input class="button button-block"  type="submit" name="log-in" value="Log In">

          <?php

           if(isset($insert_message)) {
            echo "<font size=\"3\">" . $insert_message . "</font><br><br>";
            }
            ?>
          
          </form>



        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->


    
    
    
  </body>
</html>