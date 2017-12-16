<?php include "head.php"; ?>
<?php
if ($_GET['mode'] == "" ) {
    $mode = "add";
} else {
    $mode = "edit";
    $sql = "select * from Car where Car_id='".$_GET['id']."'";
    $query = mysqli_query($connect, $sql);
    $array = mysqli_fetch_array($query);
}
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> ข้อมูลพนักงาน</h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal"  action="car_save.php"  id="myform" method="post">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">ทะเบียนรถลาก</label>
                                <div class="col-sm-4">
                                    <input type="text" placeholder="กรุณากรอกทะเบียนรถลาก" class="form-control" name="Car_id" value="<?=$array['Car_id']?>" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">ยี่ห้อ</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกยี่ห้อ" name="Car_brand"  class="form-control" value="<?=$array['Car_brand']?>" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">สี</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกสี" name="Car_color" class="form-control" value="<?=$array['Car_color']?>" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <input type="hidden" name="mode" value="<?= $mode ?>">
                                    <input type="hidden" name="car_id2" value="<?=$array['Car_id']?>">
                                    <a type="reset" class="btn btn-danger" href="car_list.php">ยกเลิก</a>
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