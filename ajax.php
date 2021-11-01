<?php
include("database.php");
if(isset($_POST['country_Id'])){
    $id=$_POST['country_Id'];
    $sel=mysqli_query($conn,"select * from state where country_id='$id'");
    echo "<option value=''>Select state</option>";
    while($arr=mysqli_fetch_assoc($sel)){
        echo "<option value='$arr[id]'>$arr[name]</option>";
    }
}
if(isset($_POST['state_Id'])){
    $id=$_POST['state_Id'];
    $sel=mysqli_query($conn,"select * from city where state_id='$id'");
    echo "<option value=''>Select city</option>";
    while($arr=mysqli_fetch_assoc($sel)){
        echo "<option value='$arr[id]'>$arr[name]</option>";
    }
}
?>