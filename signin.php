<?php
session_start();

include "config.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select * from Employee where Emp_user='".$username."' and Emp_pass='".$password."' ";
$query = mysqli_query($connect, $sql);
$row = mysqli_num_rows($query);
if ($row == 0) {
   echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
   echo "<meta http-equiv='refresh' content='0;URL=login.php' />";
} else {
    $data = mysqli_fetch_array($query);
    $_SESSION['ss_login'] = session_id();
    $_SESSION['ss_emp_id'] = $data['Emp_id'];
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}
?>
