<?php
session_start();
include "config.php";

if($_POST['mode']=="add"){
    $sql_card = "select * from Car where Car_id='".$_POST['Car_id']."'";
    $query_card = mysqli_query($connect, $sql_card);
    $num = mysqli_num_rows($query_card);
    if($num>=1){
        echo "<script>alert('ทะเบียนรถลากนี่ มีอยู่แล้วในระบบ');</script>";
        echo "<META http-equiv='refresh' Content='0; URL=car_list.php'> ";
        exit();
    }
    $sql = "insert into car(Car_id,Car_brand,Car_color) 
            values('" . $_POST['Car_id'] . "','" . $_POST['Car_brand'] . "','" . $_POST['Car_color'] . "')";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=car_list.php'> ";
}elseif($_POST['mode']=="edit"){
    if($_POST['Car_id']!=$_POST['car_id2']){
        $sql_id = "select * from Car where Car_id='".$_POST['Car_id']."'";
        $query_id = mysqli_query($connect, $sql_id);
        $num = mysqli_num_rows($query_id);
        if($num>=1){
            echo "<script>alert('ทะเบียนรถลากนี่ มีอยู่แล้วในระบบ');</script>";
            echo "<META http-equiv='refresh' Content='0; URL=car_list.php'> ";
            exit();
        }
    }
    $sql = "update Car set Car_id='" . $_POST['Car_id'] . "',Car_brand='" . $_POST['Car_brand'] . "',Car_color='" . $_POST['Car_color'] . "'"
            . "where Car_id='" . $_POST['car_id2'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<META http-equiv='refresh' Content='0; URL=car_list.php'> ";
}elseif($_GET['mode']=="delete"){
    $sql = "delete from Car  where Car_id='" . $_GET['id'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=car_list.php'> ";
}
?>
