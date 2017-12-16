<?php include "head.php"; ?>
<?php
if ($_GET['mode'] == "") {
    $mode = "add";
    $id1 = "Select Max(substr(Tar_id,-8))+1 as MaxID from Trailer";
    $id2 = mysqli_query($connect, $id1);
    $newid = mysqli_fetch_array($id2);
    if ($newid['MaxID'] == "") {
        $autoid = "TA00000001";
    } else {
        $autoid = "TA" . sprintf("%08d", $newid['MaxID']);
    }
} else {
    $mode = "edit";
    $sql = "select * from Trailer where Tar_id='".$_GET['id']."'";
    $query = mysqli_query($connect, $sql);
    $array = mysqli_fetch_array($query);
    $autoid=$array['Tar_id'];
}
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> ข้อมูลเทรลเลอร์</h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal"  action="trailer_save.php"  id="myform" method="post">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">รหัสเทรลเลอร์</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="Tar_id" value="<?= $autoid ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">ทะเบียนเทรลเลอร์</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกทะเบียนเทรลเลอร์" name="Tar_roll"  class="form-control" value="<?=$array['Tar_roll']?>" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">ลักษณะ</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกลักษณะ" name="Tar_look" class="form-control" value="<?=$array['Tar_look']?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">ขนาด</label>
                                <div class="col-sm-4">
                                    <input type="tel" name="Tar_size" placeholder="กรุณากรอกขนาด" class="form-control" value="<?=$array['Tar_size']?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <input type="hidden" name="mode" value="<?= $mode ?>">
                                    <a type="reset" class="btn btn-danger" href="trailer_list.php">ยกเลิก</a>
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