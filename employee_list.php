<?php include "head.php"; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> ข้อมูลพนักงาน</h2>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-4">
                        <form name="frmSearch" method="GET">
                            <div class="form-group input-group">
                                <input type="search" name="search" class="form-control" placeholder="ค้นหาข้อมูล">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                                </span>
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-md-8">
                        <div class="pull-right">
                            <a class="btn btn-success" href="employee_view.php">
                                <i class="glyphicon glyphicon-plus "></i> เพื่มข้อมูล
                            </a>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>รหัสพนักงาน</th>
                                    <th>รหัสบัตรประชาชน</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>เพศ</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>ตำแหน่ง</th>
                                    <th>ทะเบียนรถ</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 0;
                                $sql = "select * from Employee where Emp_id like '%".$_GET['search']."%' or Emp_card like '%".$_GET['search']."%' or Emp_name like '%".$_GET['search']."%'  order by Emp_id asc";
                                $query = mysqli_query($connect, $sql);
                                $num = mysqli_num_rows($query);
                                if ($num > 0) {
                                    while ($array = mysqli_fetch_array($query)) {
                                        $n++;
                                        if ($array['Emp_sex'] == "0") {
                                            $sex = "ชาย";
                                        } elseif ($array['Emp_sex'] == "1") {
                                            $sex = "หญิง";
                                        }
                                        if ($array['Emp_pos'] == "0") {
                                            $pos = "เจ้าของบริษัท";
                                        } elseif ($array['Emp_pos'] == "1") {
                                            $pos = "ผู้ดูแลระบบ";
                                        } elseif ($array['Emp_pos'] == "2") {
                                            $pos = "พนักงาน";
                                        } elseif ($array['Emp_pos'] == "3") {
                                            $pos = "พนักงานขับรถ";
                                        } elseif ($array['Emp_pos'] == "4") {
                                            $pos = "พนักงานโอเปอเรเตอร์";
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $n; ?></td>
                                            <td><?= $array['Emp_id'] ?></td>
                                            <td><?= $array['Emp_card'] ?></td>
                                            <td><?= $array['Emp_name'] ?></td>
                                            <td><?= $sex ?></td>
                                            <td><?= $array['Emp_tel'] ?></td>
                                            <td><?= $pos ?></td>
                                            <td><?= $array['Car_id'] ?></td>
                                            <td class="center">
                                                <a class="btn btn-info" href="employee_view.php?mode=edit&id=<?=$array['Emp_id']?>">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" href="employee_save?mode=delete&id=<?=$array['Emp_id']?>&login=<?=$login['Emp_id']?>" onclick="return confirm('คุณต้องการลบข้อมูลนี่ ? ')">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>  
                                    <tr>
                                        <th style="text-align: center;" colspan="9"> ไม่พบข้อมูล</th>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--/row-->

<?php include "footer.php"; ?>