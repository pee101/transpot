<?php
session_start();
include "config.php";

if($_POST['mode']=="add"){
//    $sql_card = "select * from Employee where Emp_card='".$_POST['Emp_card']."'";
//    $query_card = mysqli_query($connect, $sql_card);
//    $num = mysqli_num_rows($query_card);
    if($_POST['Emp_pos']=="3"){
        $car=$_POST['Car_id'];
    }else{
        $car="";
    }
    $sql = "insert into Employee(Emp_id,Emp_card,Emp_name,Emp_sex,Emp_tel,Emp_pos,Emp_user,Emp_pass,Car_id) 
            values('" . $_POST['Emp_id'] . "','" . $_POST['Emp_card'] . "','" . $_POST['Emp_name'] . "',
            '" . $_POST['Emp_sex'] . "','" . $_POST['Emp_tel'] . "','" . $_POST['Emp_pos'] . "',
            '" . $_POST['Emp_user'] . "','" . $_POST['Emp_pass1'] . "','" . $car . "')";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=employee_list.php'> ";
}elseif($_POST['mode']=="edit"){
    if($_POST['Emp_pos']=="3"){
    $car=$_POST['Car_id'];
    }else{
        $car="";
    }
    $sql = "update Employee set Emp_card='" . $_POST['Emp_card'] . "',Emp_name='" . $_POST['Emp_name'] . "',
            Emp_sex='" . $_POST['Emp_sex'] . "',Emp_tel='" . $_POST['Emp_tel'] . "',Emp_pos='" . $_POST['Emp_pos'] . "',
            Emp_user='" . $_POST['Emp_user'] . "',Emp_pass='" . $_POST['Emp_pass1'] . "',Car_id='" . $car . "'
            where Emp_id='" . $_POST['Emp_id'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
    echo "<META http-equiv='refresh' Content='0; URL=employee_list.php'> ";
}elseif($_GET['mode']=="delete"){
    $sql = "delete from Employee  where Emp_id='" . $_GET['id'] . "'";
    $query = mysqli_query($connect, $sql);
    echo "<META http-equiv='refresh' Content='0; URL=employee_list.php'> ";
}
?>
