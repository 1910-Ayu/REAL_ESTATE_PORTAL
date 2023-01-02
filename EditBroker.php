<?php
include_once('config/config.php');
if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);	
    $contact = mysqli_real_escape_string($mysqli, $_POST['contact']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $experience = $_POST['experience'];
    $commission = $_POST['commission'];
    $status_input = $_POST["status"];
    if($status_input == "Active"){
        $status=1;
    }else{
        $status=0;
    }

   
    $result = mysqli_query($mysqli, "UPDATE broker SET Name='$name',
     Contact='$contact', Email ='$email', Experience='$experience',
     Commission='$commission',Status='$status' WHERE sno=$id;");
    if($result) {header("location:ViewBrokers.php");}else{
        echo "<h1>Something went wrong</h1>";
    }
        
        
    
}
?>

<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "select * from broker where sno = $id");
while($res=mysqli_fetch_array($result)){
    $name = $res['Name'];
    $contact = $res['Contact'];
    $email = $res['Email'];
    $experience = $res['Experience'];
    $Commission = $res['Commission'];
    $status = $res['Status'];
}
if($status){
    $stat = "Active";
}else{
    $stat = "Inactive";
}
if($stat == "Active"){
    $other = "Inactive";
}else{
    $other = "Active";
}
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <form action= "" method="POST">
            
                <label for="name" style="font-weight:bold; margin-top:5px;">Name of Broker</label>
                <input name="name" type="text"  
                class="form-control" 
                id="name" value="<?php echo $name;?>">
            
            
                <label for="contact" style="font-weight:bold; margin-top:5px;">Contact</label>
                <input class="form-control" id="contact" type="text"
                value="<?php echo $contact; ?>" name="contact">
            
            
                <label for="title" style="font-weight:bold; margin-top:5px;">Email</label>
                <input name="email" type="email" class="form-control" 
                id="email" value="<?php echo $email;?>">
            
            
                <label for="experience" style="font-weight:bold; margin-top:5px;">Experience</label>
                <input name="experience" type="number" class="form-control"
                 id="experience" value="<?php echo $experience;?>">
            
            
                <label for="commission" style="font-weight:bold; margin-top:5px;">Commission</label>
                <input name="commission" type="number" class="form-control"
                 id="commission" value="<?php echo $commission;?>">
            
                 <p style="text-align:center; font-weight:bold;"> Status of Broker<p>
        <select id="status" name="status"
        style="padding: 10px; background:#edf2ff; border:none;">
           
           <option value="<?php echo $stat;?>"><?php echo $stat; ?></option>
           <option value="<?php echo $other;?>"><?php echo $other;?></option>
          </select>
          <br>
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <button type="submit" class="btn btn-dark" value="update" name="update">Edit Broker Information</button>
        </form>
    </div>


 
</body>
</html>
   