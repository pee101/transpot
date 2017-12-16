<?php include "head.php"; ?>
<?php
if ($_GET['mode'] == "") {
    $mode = "add";
    $id1 = "Select Max(substr(Cat_id,-8))+1 as MaxID from Category";
    $id2 = mysqli_query($connect, $id1);
    $newid = mysqli_fetch_array($id2);
    if ($newid['MaxID'] == "") {
        $autoid = "CA00000001";
    } else {
        $autoid = "CA" . sprintf("%08d", $newid['MaxID']);
    }
} else {
    $mode = "edit";
    $sql = "select * from Category where Cat_id='".$_GET['id']."'";
    $query = mysqli_query($connect, $sql);
    $array = mysqli_fetch_array($query);
    $autoid=$array['Cat_id'];
}
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> ข้อมูลประเภทสินค้า</h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal"  action="category_save"  id="myform" method="post">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">รหัสประเภท</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="Cat_id" value="<?= $autoid ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">ชื่อประเภท</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกชื่อประเภท" name="Cat_name"  class="form-control" value="<?=$array['Cat_name']?>" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <input type="hidden" name="mode" value="<?= $mode ?>">
                                    <a type="reset" class="btn btn-danger" href="category_list.php">ยกเลิก</a>
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