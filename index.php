<?php
    include_once("config/config.php");
    
?>

<?php

    session_start();
    if(isset($_SESSION['loggedin'])){
        $i = $_SESSION['id'];
        $sql = "SELECT * from user WHERE sno='$i'";
        $a = mysqli_query($mysqli,$sql);
        while($aa = mysqli_fetch_array($a)){
            $is = $aa['isAdmin'];
        }
    
        if($is){
            header("location:AdminView.php");
        }else{
            header("location:BrokerView.php");
        }
    }

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM user WHERE email='$email'";
        
        $res = mysqli_query($mysqli,$sql);
        
        $count = mysqli_num_rows($res);  

        while( $result = mysqli_fetch_array($res)){
            $pass = $result['password'];
            $isadmin = $result['isAdmin'];
            $id = $result['sno'];
        }
        $sql2 = "SELECT * from broker WHERE Email='$email'";
        $res = mysqli_query($mysqli,$sql2);
        while($res2 = mysqli_fetch_array($res)){
            $status = $res2['Status'];
        }
         if($count == 1 ){
            if(password_verify($password,$pass)){
                if($isadmin){
                    session_start();
                    $_SESSION["email"] = $email;
                    $_SESSION["id"] = $id;
                    $_SESSION["loggedin"] = true;
                    header("location:AdminView.php");
                    exit;
                }else{
                if($status){
                    session_start();
                    $_SESSION["email"] = $email;
                    $_SESSION["id"] = $id;
                    $_SESSION["loggedin"] = true;
                    header("location:BrokerView.php");
                    exit;
                    
                }else{
                    echo "<h1>Account No longer Active</h1>";
                    exit;
                }}
            }else{
                echo "<h1>Incorrect Password</h1>";
                exit;
            }
         }else{
            echo "<h1>Invalid Credentials</h1>";
            exit;
         }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    
   <div class="container">
        <h3>REAL ESTATE PORTAL</h3>
        <p style="font-size:20px"> LOGIN to Continue</p>
        <form action="index.php" method="POST">
            <input type="email" name="email" id="email" placeholder="Enter email">
            <input type="password" name="password" id="password" placeholder="Enter Password">
            <button type="submit" class="btn" value="login" name="login">Log In</button>
           
            <span>New to Portal?  <a href="register.php" class="register">Register</a></span>
        </form>
    </div> 
  
</body>
</html>