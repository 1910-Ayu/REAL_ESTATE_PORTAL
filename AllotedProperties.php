<?php

require_once("config/config.php");

session_start();
if(isset($_SESSION['loggedin'])){
    $i = $_SESSION['id'];
    $sql = "SELECT * from user WHERE sno='$i'";
    $res = mysqli_query($mysqli,$sql);
    while($result = mysqli_fetch_array($res)){
       $email = $result['email'];
    }
    $sql2 = "SELECT * from broker where Email='$email'";
    $res2 = mysqli_query($mysqli,$sql2);
    $unarr="";
    while($aa = mysqli_fetch_array($res2))
    {
        $unarr = $aa['Property'];
    }

    if($unarr == ""){
        echo "<h1>No properties Alloted yet!</h1>";
        exit;
    }
    $arr = unserialize($unarr);
    

   /*for($x=0;$x < count($arr);$x++){
        
        echo "<h1>".$arr[$x]."</h1>";
        echo "<br>";
    }*/
    echo "Properties alloted to you are listed below";
    echo "<br>";
    
    for($x=0;$x < count($arr);$x++){
        
        $add = $arr[$x];
        $no = $x +1;
        echo "<h3>".$no."</h3>";
        $sql = "select * from property where Address='$add'";
        $res3 = mysqli_query($mysqli, $sql);
        while($res4 = mysqli_fetch_array($res3)){
            echo "Owner Name :";
            echo $res4['Owner_name'];
            echo "<br>";
            echo "Owner Contact :";
            echo $res4['Owner_contact'];
            echo "<br>";
            echo "Address :";
            echo $res4['Address'];
            echo "<br>";
            echo "City :";
            echo $res4['City'];
            echo "<br>";
            echo "Zip code :";
            echo $res4['Zip_code'];
            echo "<br>";
            echo "Area :";
            echo $res4['Area'];
            echo "<br>";
            echo "Valuation :";
            echo $res4['Value'];
            echo "<br>";
        }
    }


    
}
?>

