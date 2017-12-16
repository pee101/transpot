<?php include "head.php"; ?>
<?php
    $mode = "view";
    $hidden="hidden";
    $res="disabled";
    $sql = "select * from Employee where Emp_id='".$login['Emp_id']."'";
    $query = mysqli_query($connect, $sql);
    $array = mysqli_fetch_array($query);
    $autoid=$login['Emp_id'];
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
                        <form class="form-horizontal"  action="employee_save"  id="myform" method="post">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">รหัสพนักงาน</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="Emp_id" value="<?= $autoid ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">รหัสบัตรประชาชน</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกรหัสบัตรประชาชน" name="Emp_card" maxlength="13" class="form-control" value="<?=$array['Emp_card']?>" autofocus <?=$res?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-2 control-label">ชื่อ-นามสกุล</label>
                                <div class="col-sm-4">
                                    <input type="text"  placeholder="กรุณากรอกชื่อ-นามสกุล" name="Emp_name" class="form-control" value="<?=$array['Emp_name']?>" <?=$res?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">เพศ</label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="Emp_sex" value="0" <?php if($array['Emp_sex']=="0"){echo "checked" ;}elseif($array['Emp_sex']==""){echo "checked" ;} ?> >ชาย
                                            </label>
                                        </div>
                                        <div class="col-sm-2">
                                            <label class="radio-inline">
                                                <input type="radio" name="Emp_sex" value="1" <?php if($array['Emp_sex']=="1"){echo "checked" ;} ?> >หญิง
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-4">
                                    <input type="tel" name="Emp_tel" placeholder="กรุณากรอกเบอร์โทรศัพท์" maxlength="10" class="form-control" value="<?=$array['Emp_tel']?>" <?=$res?>>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="col-sm-2 control-label">ตำแหน่ง</label>
                                <div class="col-sm-4">
                                    <select name="Emp_pos" id="position" class="form-control" <?=$res?>>
                                        <option value="3" <?php if($array['Emp_pos']=="3"){echo "selected" ;} ?>>พนักงานขับรถ</option>
                                        <option value="2" <?php if($array['Emp_pos']=="2"){echo "selected" ;} ?>>พนักงานทั่วไป</option>
                                        <option value="4" <?php if($array['Emp_pos']=="4"){echo "selected" ;} ?>>พนักงานโอเปอเรเตอร์</option>
                                        <option value="1" <?php if($array['Emp_pos']=="1"){echo "selected" ;} ?>>ผู้ดูแลระบบ</option>
                                        <option value="0" <?php if($array['Emp_pos']=="0"){echo "selected" ;} ?>>เจ้าของบริษัท</option>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group <?=$hidden?>" id="car">
                                <label for="country" class="col-sm-2 control-label">รถลาก</label>
                                <div class="col-sm-4">
                                        <select name="Car_id"  class="form-control" <?=$res?>>
                                            <option value="CA00000001">Option 1</option>
                                            <option value="CA00000001">Option 2</option>
                                            <option value="CA00000001">Option 3</option>
                                            <option value="CA00000001">Option 4</option>
                                            <option value="CA00000001">Option 5</option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="birthDate" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-4">
                                    <input type="text"  name="Emp_user" placeholder="กรุณากรอก Username"  class="form-control" value="<?=$array['Emp_user']?>" <?=$res?>>
                                </div>
                            </div>
                            <div class="form-group <?=$hidden?>">
                                <label for="birthDate" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-4">
                                    <input type="password" name="Emp_pass1" id="Emp_pass1"  placeholder="กรุณากรอก Password" class="form-control" value="<?=$array['Emp_pass']?>" <?=$res?>>
                                </div>
                            </div>
                            <div class="form-group <?=$hidden?>">
                                <label for="birthDate" class="col-sm-2 control-label">Password</label>
                                <div class="col-sm-4">
                                    <input type="password" name="Emp_pass2" id="Emp_pass2" placeholder="กรุณากรอก Password อีกครั้ง" class="form-control" value="<?=$array['Emp_pass']?>" <?=$res?>>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <a type="reset" class="btn btn-warning" href="index.php">ย้อนกลับ</a>
                                </div>
                            </div>
                        </form> <!-- /form -->
                    </div>
                </div> <!-- ./container -->
            </div>
        </div>
    </div>
</div><!--/row-->
<script>
$('#position').change(function(){
  if($(this).val()==3){ 
    $('#car').removeClass('hidden');
  }else{
    $('#car').addClass('hidden');
  }
});
$('#myform').submit(function () {
    var pass = $("#Emp_pass1").val();
    var pass2 = $("#Emp_pass2").val();
    if(pass == ''){
     alert("กรุณากรอก Password !");
     $("#Emp_pass1").focus();
     return false;
    } if(pass2 == ''){
     alert("กรุณากรอก Password อีกครั้ง !");
     $("#Emp_pass2").focus();
     return false;
    }if(pass != pass2){
     alert("Password ไม่ตรงกัน!");
     $("#Emp_pass2").focus();
     return false;
    }

});
</script>
<?php include "jquery.php"; ?>
<?php include "footer.php"; ?>