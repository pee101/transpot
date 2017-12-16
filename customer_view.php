<?php include "head.php"; ?>
<?php
if ($_GET['mode'] == "") {
    $mode = "add";
    $id1 = "Select Max(substr(Cus_id,-8))+1 as MaxID from Customer";
    $id2 = mysqli_query($connect, $id1);
    $newid = mysqli_fetch_array($id2);
    if ($newid['MaxID'] == "") {
        $autoid = "CU00000001";
    } else {
        $autoid = "CU" . sprintf("%08d", $newid['MaxID']);
    }
} else {
    $mode = "edit";
    $sql = "select * from Customer where Cus_id='".$_GET['id']."'";
    $query = mysqli_query($connect, $sql);
    $array = mysqli_fetch_array($query);
    $autoid=$array['Cus_id'];
}
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> ข้อมูลลูกค้า</h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal"  action="customer_save"  id="myform" method="post">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">รหัสลูกค้า</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="Cus_id" value="<?= $autoid ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">ชื่อ-นามสกุล</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกชื่อ-นามสกุล" name="Cus_name"  class="form-control" value="<?=$array['Cus_name']?>" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">ที่อยู่</label>
                                <div class="col-sm-4">
                                    <textarea type="text"  placeholder="กรุณากรอกที่อยู่" name="Cus_add" class="form-control" required><?=$array['Cus_add']?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-4">
                                    <input type="tel" name="Cus_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์" maxlength="10" class="form-control" value="<?=$array['Cus_tel']?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">ชื่อบริษัท</label>
                                <div class="col-sm-4">
                                    <input type="tel" name="Cus_company" placeholder="กรุณากรอกชื่อบริษัท" class="form-control" value="<?=$array['Cus_company']?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">เพศ</label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="Cus_sex" value="0" <?php if($array['Cus_sex']=="0"){echo "checked" ;}elseif($array['Emp_sex']==""){echo "checked" ;} ?> >ชาย
                                            </label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="Cus_sex" value="1" <?php if($array['Cus_sex']=="1"){echo "checked" ;} ?> >หญิง
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">E-mail</label>
                                <div class="col-sm-4">
                                    <input type="email" name="Cus_mail" placeholder="กรุณากรอก E-mail" class="form-control" value="<?=$array['Cus_mail']?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <input type="hidden" name="mode" value="<?= $mode ?>">
                                    <a type="reset" class="btn btn-danger" href="customer_list.php">ยกเลิก</a>
                                    <button type="reset" class="btn btn-success">Reset</button>
                                    <button type="submit" class="btn btn-primary ">บันทึก</button>
                                </div>
                            </div>
                        </form> <!-- /form -->
                    </div>
                </div> <!-- ./container -->
            </div>
        </div>
    </div>
</div><!--/row-->
<?php include "jquery.php"; ?>
<?php include "footer.php"; ?>