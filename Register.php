<?php
    require_once("config/config.php");
?>

<?php
    if(isset($_POST['signup'])){
        $username = mysqli_real_escape_string($mysqli, $_POST['username']);
        $email = mysqli_real_escape_string($mysqli, $_POST['email']);
        $password = mysqli_real_escape_string($mysqli,$_POST['password']);
        $role = mysqli_real_escape_string($mysqli,$_POST['role']);
        $isAdmin = FALSE;
        if($role == "Admin"){
            $isAdmin = TRUE;
        }
        $confirmpassword = mysqli_real_escape_string($mysqli, $_POST['confirmpassword']);
        $pass = password_hash($password,PASSWORD_DEFAULT);
        $sql = "insert into user(username, password,email,isAdmin) values('$username','$pass','$email','$isAdmin')";
        $result = mysqli_query($mysqli, $sql);
        if($result){
            header("location: index.php");
            
        }else{
            echo"failure";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <h3>REAL ESTATE PORTAL</h3>
        <p style="font-size:20px"> Register  </p>
    <form action="register.php" method="POST">
        <input type="text" name="username" id="username" placeholder="Enter Username">
        <input type="email" name="email" id="email" placeholder="Enter Email">
        <input type="password" name="password" id="password" placeholder="Enter Password">
        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Enter Password again">
        <input type="text" name="role" id="role" placeholder="Enter Role Admin or Broker">

        <button type="submit" value="signup" name="signup" class="register">Register</button>
    </form>

    </div>
</body>
</html>