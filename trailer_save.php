<?php
session_start();
include "config.php";

if($_POST['mode']=="add"){
    $sql_card = "select * from Trailer where Tar_roll='".$_POST['Tar_roll']."'";
    $query_card = mysqli_query($connect, $sql_card);
    $num = mysqli_num_rows($query_card);
    if($num>=1){
        echo "<script>alert('ทะเบียนเทรลเลอร์นี่ มีอยู่แล้วในระบบ');</script>";
        echo "<META http-equiv='refresh' Content='0; URL=trailer_list.php'> ";
        exit();
    }
    $sql = "insert into Trailer(Tar_id,Tar_roll,Tar_look,Tar_size) 
            values('" . $_POST['Tar_id'] . "','" . $_POST['Tar_roll'] . "','" . $_POST['Tar_look'] . "','" . $_POST['Tar_size'] . "')";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=trailer_list.php'> ";
}elseif($_POST['mode']=="edit"){
    $sql = "update Trailer set Tar_roll='" . $_POST['Tar_roll'] . "',Tar_look='" . $_POST['Tar_look'] . "',Tar_size='" . $_POST['Tar_size'] . "' where Tar_id='" . $_POST['Tar_id'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<META http-equiv='refresh' Content='0; URL=trailer_list.php'> ";
}elseif($_GET['mode']=="delete"){
    $sql = "delete from Trailer  where Tar_id='" . $_GET['id'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=trailer_list.php'> ";
}
?>

