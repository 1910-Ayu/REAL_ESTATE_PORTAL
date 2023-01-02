<?php
    require_once("config/config.php");
?>

<?php
    $sql = "select * from broker";
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
       
        <div class="data">
            <p>Name of Broker :</p>
          <strong> <?php echo $res['Name'] ?></strong>
        </div>
         <div class="data">
           <p> Contact of Broker :</p>
          <strong> <?php echo $res['Contact'] ?></strong>
        </div>
        <div class="data">
           <p> Email Address :</p>
          <strong> <?php echo $res['Email'] ?></strong>
        </div>
        <div class="data">
           <p>Experience :</p>
          <strong> <?php echo $res['Experience'] ?>  years </strong>
        </div>
        
        <div class="data">
            <p>Commission :</p>
          <strong> <?php echo $res['Commission'] ?>  %</strong>
        </div>
        
        <div class="data">
        <p>Current Status :</p>
          <strong> <?php 
           if($res['Status']){
            $stat = "Active";
           }else{
            $stat = "Inactive";
           }
           echo $stat;
            ?></strong>
        </div>
        <br>
      
       <?php $sno = $res['sno'];?>
       
            <a href="EditBroker.php?id=<?php echo $sno?>" class="edit_btn"> Edit</a>
            <a href="DeleteBroker.php?id=<?php echo $sno?>" class="delete_btn"> Delete </a>
            <br>
            <br>
            <hr>
    <?php
    }
    ?>
</div>
</body>
</html>