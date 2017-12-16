<?php include "head.php"; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> ข้อมูลลูกค้า</h2>
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
                            <a class="btn btn-success" href="customer_view.php">
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
                                    <th>รหัสลูกค้า</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>เพศ</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <th>ชื่อบริษัท</th>
                                    <th>E-mail</th>
                                    <th>จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 0;
                                $sql = "select * from Customer where Cus_id like '%".$_GET['search']."%' or Cus_name like '%".$_GET['search']."%' "
                                        . "or Cus_add like '%".$_GET['search']."%' or Cus_tel like '%".$_GET['search']."%'"
                                        . "or Cus_company like '%".$_GET['search']."%'or Cus_mail like '%".$_GET['search']."%' order by Cus_id asc";
                                $query = mysqli_query($connect, $sql);
                                $num = mysqli_num_rows($query);
                                if ($num > 0) {
                                    while ($array = mysqli_fetch_array($query)) {
                                        $n++;
                                        if($array['Cus_sex']=="0"){
                                            $sex="ชาย";
                                        }else{
                                            $sex="หญิง";
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $n; ?></td>
                                            <td><?= $array['Cus_id'] ?></td>
                                            <td><?= $array['Cus_name'] ?></td>
                                            <td><?= $sex ?></td>
                                            <td><?= $array['Cus_add'] ?></td>
                                            <td><?= $array['Cus_tel'] ?></td>
                                            <td><?= $array['Cus_company'] ?></td>
                                            <td><?= $array['Cus_mail'] ?></td>
                                            <td class="center">
                                                <a class="btn btn-info" href="customer_view.php?mode=edit&id=<?=$array['Cus_id']?>">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" href="customer_save.php?mode=delete&id=<?=$array['Cus_id']?>" onclick="return confirm('คุณต้องการลบข้อมูลนี่ ? ')">
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