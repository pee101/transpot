<?php
session_start();
include "config.php";

if($_POST['mode']=="add"){
    $sql = "insert into Category(Cat_id,Cat_name) 
            values('" . $_POST['Cat_id'] . "','" . $_POST['Cat_name'] . "')";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=category_list.php'> ";
}elseif($_POST['mode']=="edit"){
    $sql = "update Category set Cat_name='" . $_POST['Cat_name'] . "' where Cat_id='" . $_POST['Cat_id'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<META http-equiv='refresh' Content='0; URL=category_list.php'> ";
}elseif($_GET['mode']=="delete"){
    $sql = "delete from Category  where Cat_id='" . $_GET['id'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=category_list.php'> ";
}
?>

