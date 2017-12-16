<?php
session_start();
include "config.php";
if($_SESSION['ss_login'] != session_id() or $_SESSION['ss_emp_id']==NULL ){
    echo "<script>alert('กรุณาลงชื่อเข้าสู่ระบบก่อน');</script>";
    echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Silamas || Transport </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>
    <script src="bower_components/jquery/jquery.min.js"></script>
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
    <body>    
<?php
$sql_login = "select * from Employee where Emp_id='".$_SESSION['ss_emp_id']."'";
$result_login = mysqli_query($connect, $sql_login);
$login = mysqli_fetch_array($result_login);
?>
<div class="navbar navbar-default" role="navigation">
    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php"> 
            <span>Silamas Transport</span></a>
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?=$login['Emp_name']?></span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="employee_profile.php?mode=view">Profile</a></li>
                <li class="divider"></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <?php 
        if($login['Emp_pos']=="0" or $login['Emp_pos']=="1" ){?>
        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon-star"></i> จัดการข้อมูลพื้นฐาน <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="employee_list.php">ข้อมูลพนักงาน</a></li>
                    <li><a href="car_list.php">ข้อมูลรถลาก</a></li>
                    <li><a href="trailer_list.php">ข้อมูลเทรลเลอร์</a></li>
                    <li><a href="category_list.php">ข้อมูลประเภทสินค้า</a></li>
                    <li><a href="customer_list">ข้อมูลลูกค้า</a></li>
                </ul>
            </li>
        </ul>
        <?php } ?>
        <?php if($login['Emp_pos']=="0"){?>
        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown"><i class="glyphicon glyphicon glyphicon-bookmark"></i> รายงาน <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href=#">รายงานข้อมูลพนักงาน</a></li>
                    <li><a href="#">รายงานข้อมูลรถลาก</a></li>
                    <li><a href="#">รายงานข้อมูลเทรลเลอร์</a></li>
                    <li><a href="#">รายงานข้อมูลประเภทสินค้า</a></li>
                    <li><a href="#">รายงานข้อมูลลูกค้า</a></li>
                </ul>
            </li>
        </ul>
        <?php } ?>
    </div>
</div>
<div class="ch-container">
    <div class="row">
    <?php 
    if($login['Emp_pos']=="2"){
        include "sidebar.php";
        $size="10";
    }else{
        $size="12";
    }
 ?>
    <div id="content" class="col-lg-<?=$size?> col-sm-<?=$size?>">