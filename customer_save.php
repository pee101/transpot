<?php
session_start();
include "config.php";

if($_POST['mode']=="add"){
    $sql_card = "select * from Customer where Cus_name='".$_POST['Cus_name']."'";
    $query_card = mysqli_query($connect, $sql_card);
    $num = mysqli_num_rows($query_card);
    if($num>=1){
        echo "<script>alert('ชื่อลูกค้านี่ มีอยู่แล้วในระบบ');</script>";
        echo "<META http-equiv='refresh' Content='0; URL=customer_list.php'> ";
        exit();
    }
    $sql = "insert into Customer(Cus_id,Cus_name,Cus_add,Cus_tel,Cus_company,Cus_sex,Cus_mail) 
            values('" . $_POST['Cus_id'] . "','" . $_POST['Cus_name'] . "','" . $_POST['Cus_add'] . "'"
            . ",'" . $_POST['Cus_tel'] . "','" . $_POST['Cus_company'] . "','" . $_POST['Cus_sex'] . "','" . $_POST['Cus_mail'] . "')";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=customer_list.php'> ";
}elseif($_POST['mode']=="edit"){
    $sql = "update Customer set Cus_name='" . $_POST['Cus_name'] . "',Cus_tel='" . $_POST['Cus_tel'] . "'"
            . ",Cus_company='" . $_POST['Cus_company'] . "',Cus_add='" . $_POST['Cus_add'] . "',Cus_sex='" . $_POST['Cus_sex'] . "',"
            . "Cus_mail='" . $_POST['Cus_mail'] . "' where Cus_id='" . $_POST['Cus_id'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<META http-equiv='refresh' Content='0; URL=customer_list.php'> ";
}elseif($_GET['mode']=="delete"){
    $sql = "delete from Customer  where Cus_id='" . $_GET['id'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=customer_list.php'> ";
}
?>

