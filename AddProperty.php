<?php
    require_once("config/config.php");
?>

<?php
    if(isset($_POST['add'])){
        $ownername = mysqli_real_escape_string($mysqli, $_POST['ownerName']);
        $contact = mysqli_real_escape_string($mysqli, $_POST['contact']);
        $address = mysqli_real_escape_string($mysqli,$_POST['address']);
        $city = mysqli_real_escape_string($mysqli,$_POST['city']);
        $code = mysqli_real_escape_string($mysqli,$_POST['code']);
        $area = mysqli_real_escape_string($mysqli,$_POST['area']);
        $value = $_POST['value'];
        $status_input = mysqli_real_escape_string($mysqli,$_POST['status']);
        
        if($status_input == "active"){
            $status = 1;
        }else{
            $status=0;
        }
       $sql = "insert into property(Owner_name,Owner_contact,Address,City,Zip_code,Area,Value,status)
        values('$ownername','$contact','$address','$city','$code','$area','$value','$status')";
      
        $result = mysqli_query($mysqli, $sql);
        if($result){
            header("location: ViewProperties.php");
            
        }else{
            echo "<h1>Something went wrong </h1>";
        }
    }
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
    <form action="addproperty.php" method="POST">
        <input type="text" name="ownerName" id="ownerName" placeholder="Enter name of owner">
        <input type="text" name="contact" id="contact" placeholder="Enter contact of owner">
        <input type="textarea" name="address" id="address" placeholder="Enter address of property">
        <input type="text" name="city" id="city" placeholder="Enter city">
        <input type="text" name="code" id="code" placeholder="Enter zip code">
        <label for="area" style="font-weight:bold; margin-top:10px;">Enter area of property in meter squares</label>
        <input type="number" name="area" id="area" min="0" max="50000">
        <input type="text" name="value" id="value" placeholder="Enter valuation of property">

        <p style="text-align:center; font-weight:bold;"> Status of Property<p>
        <select id="status" name="status"
        style="padding: 10px; background:#edf2ff; border:none;">
            <option value="active">active</option>
            <option value ="inacive">inactive</option>
        </select>
        <br>

        <button type="submit" value="add" name="add" class="edit_btn">Add Property</button>
    </form>
</body>
</html>