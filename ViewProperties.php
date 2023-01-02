<?php
    require_once("config/config.php");
?>

<?php
    $sql = "select * from property";
   $result = mysqli_query($mysqli, $sql);
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
    <?php
    while($res = mysqli_fetch_array($result))
    { ?>
       <div class="store">
       
        <div class="data" >
           <p> Name of Owner :</p>
         <strong>  <?php echo $res['Owner_name'] ?></strong>
        </div>
        <div class="data">
           <p> Contact of Owner :</p>
          <strong> <?php echo $res['Owner_contact'] ?></strong>
        </div>
        <div class="data" >
            <p>Address of Property :</p>
           <strong><?php echo $res['Address'] ?></strong>
        </div>
        <div class="data">
            <p>City :</p>
          <strong> <?php echo $res['City'] ?></strong>
        </div>
        <div class="data">
            <p>Zip Code :</p>
          <strong> <?php echo $res['Zip_code'] ?></strong>
        </div>
        <div class="data">
            <p>Area of Property :</p>
           <strong><?php echo $res['Area'] ?></strong>
        </div>
        <div class="data">
            <p>Value of Property :</p>
          <strong> <?php echo $res['Value'] ?></strong>
        </div>
        <div class="data">
          <p> Current Status :</p>
          <strong> <?php 
           if($res['status']){
            $stat = "Active";
           }else{
            $stat = "Inactive";
           }
           echo $stat;
            ?></strong>
        </div>
        

      
       <?php $sno = $res['sno'];?>
       <br>
         <a href="EditProperty.php?id=<?php echo $sno;?>" class="edit_btn" > Edit </a>
         <a href="DeleteProperty.php?id=<?php echo $sno;?>" class="delete_btn"> Delete </a>
    <br>
    <br>
    <hr>
      <div>
    <?php
    }
    ?>
</div>
    

</body>
</html>