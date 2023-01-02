<?php
    require_once("config/config.php");
?>

<?php
    if(isset($_POST['add'])){
        $name = mysqli_real_escape_string($mysqli, $_POST['Name']);
        $contact = mysqli_real_escape_string($mysqli, $_POST['contact']);
        $email = mysqli_real_escape_string($mysqli,$_POST['email']);
        $status_input = mysqli_real_escape_string($mysqli,$_POST['status']);
        $experience = $_POST['experience'];
        $commission = $_POST['commission'];
        $property_input = $_POST['chkl'];
     
        $property = serialize($property_input);

        if($status_input == "active"){
            $status = 1;
        }
        else{
            $status =0;
        }
        
      
       $sql = "insert into broker(Name,Contact,Email,Experience,Property,Commission,Status)
        values('$name','$contact','$email','$experience','$property','$commission','$status')";
       
        $result = mysqli_query($mysqli, $sql);
        if($result){
            header("location: ViewBrokers.php");
            
        }else{
            echo "<h1>Something went wrong</h1>";
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
    <form action="addbroker.php" method="POST">
        <input type="text" name="Name" id="Name" placeholder="Enter name of Broker">
        <input type="email" name="email" id="email" placeholder="Enter email of Broker">
        <input type="text" name="contact" id="contact" placeholder="Enter contact of owner">
        <label for="experience" style="margin-top:5px; font-weight:bold;">Enter Experience of Broker in the field</label>
        <input type="number" name="experience" id="experience" min="0" max="25">
        <label for="Commission" style="margin-top:5px; font-weight:bold;">Enter Commission in percentage</label>
        <input type="number" name="Commission" id="Commission" min="1" max="100">

        <br>
        <p style="text-align:center; font-weight:bold;"> Status of Broker<p>
        <select id="status" name="status"
        style="padding: 10px; background:#edf2ff; border:none;">
           <option value="active" >Active</option>
           <option value="inactive">Inactive</option>
        </select>
        <p style="text-align:center; font-weight:bold;"> Select properties from the following for the broker</p>
        <?php 
        $sql = "select * from property";
        $result = mysqli_query($mysqli, $sql);
        while($rows = mysqli_fetch_array($result)){?>
            <?phpif($rows[$status]){?>
                <label class="con" style=""> <p style="margin-top:15px"><?php  echo $rows['Address'];?></p>
            <input type="checkbox" name="chkl[ ]" value="<?php  echo $rows['Address'];?>">
            <span class="checkmark"></span>
            </label>
            
            <?php}?>
            <?php
            
        }?>
  
        <button type="submit" value="add" name="add" class="edit_btn">Add Broker</button>
    </form>

</body>
</html>