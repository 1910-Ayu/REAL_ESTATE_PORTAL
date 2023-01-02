<?php
include_once("config/config.php");
if(isset($_POST['update'])){
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
    $name = mysqli_real_escape_string($mysqli, $_POST['ownername']);	
    $contact = mysqli_real_escape_string($mysqli, $_POST['ownercontact']);
    $address = mysqli_real_escape_string($mysqli, $_POST['address']);
    $city = mysqli_real_escape_string($mysqli, $_POST['city']);
    $code= $_POST['code'];
    $area = $_POST['area'];
    $value = $_POST['value'];
    $status_input = $_POST["status"];
    if($status_input == "Active"){
        $status=1;
    }else{
        $status=0;
    }

   
    $result = mysqli_query($mysqli, "UPDATE property SET Owner_name='$name',
     Owner_contact='$contact', Address ='$address', City='$city', Zip_code='$code',
     Area='$area',Value = 'value',status='$status' WHERE sno=$id;");
    if($result) {header("location:ViewProperties.php");}else{
        echo "<h1>Something went wrong</h1>";
    }
      
}
?>

<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "select * from property where sno = $id");
while($res=mysqli_fetch_array($result)){
    $owner_name = $res['Owner_name'];
    $owner_contact = $res['Owner_contact'];
    $address = $res['Address'];
    $city = $res['City'];
    $code = $res['Zip_code'];
    $area = $res['Area'];
    $value = $res['Value'];
    $status = $res['status'];
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
          
        <label for="name" style="font-weight:bold; margin-top:5px;">Name of Owner</label>
                <input name="ownername" type="text"  
                class="form-control" 
                placeholder="Name of Owner"
                id="name" value="<?php echo $owner_name;?>">
            
           
                <label for="contact" style="font-weight:bold; margin-top:5px;">Contact of Owner</label>
                <input class="form-control" id="contact" type="text"
                value="<?php echo $owner_contact; ?>" name="ownercontact">
            
            
                <label for="address" style="font-weight:bold; margin-top:5px;">Address of property</label>
                <input name="address" type="text" class="form-control" 
                id="address" value="<?php echo $address;?>">
            
            
                <label for="city" style="font-weight:bold; margin-top:5px;">City</label>
                <input name="city" type="text" class="form-control"
                 id="city" value="<?php echo $city;?>">
            
            
                <label for="code" style="font-weight:bold; margin-top:5px;">Code</label>
                <input name="code" type="text" class="form-control"
                 id="code" value="<?php echo $code;?>">
            
            
                <label for="area" style="font-weight:bold; margin-top:5px;">Area</label>
                <input name="area" type="number" class="form-control"
                 id="area" value="<?php echo $area;?>">
            
            
                <label for="value" style="font-weight:bold; margin-top:5px;">Valuation</label>
                <input name="value" type="number" class="form-control"
                 id="value" value="<?php echo $value;?>">
            
                 <p style="text-align:center; font-weight:bold;"> Status of Property<p>
        <select id="status" name="status"
        style="padding: 10px; background:#edf2ff; border:none;">
           
           <option value="<?php echo $stat;?>"><?php echo $stat; ?></option>
           <option value="<?php echo $other;?>"><?php echo $other;?></option>
          </select>
          <br>
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <button type="submit" class="btn btn-dark" value="update" name="update">Edit Property Information</button>
        </form>
    </div>





</body>
</html>

