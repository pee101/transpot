<?php include "head.php"; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> ข้อมูลรถลาก</h2>
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
                            <a class="btn btn-success" href="car_view.php">
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
                                    <th class="text-center">#</th>
                                    <th class="text-center">ทะเบียนรถลาก</th>
                                    <th class="text-center">ยี่ห่อ</th>
                                    <th class="text-center">สี</th>
                                    <th class="text-center">จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 0;
                                $sql = "select * from Car where Car_id like '%".$_GET['search']."%' or Car_brand like '%".$_GET['search']."%' or Car_color like '%".$_GET['search']."%'  order by Car_id asc";
                                $query = mysqli_query($connect, $sql);
                                $num = mysqli_num_rows($query);
                                if ($num > 0) {
                                    while ($array = mysqli_fetch_array($query)) {
                                        $n++;
                                        ?>
                                        <tr>
                                            <td class="text-center"><?= $n; ?></td>
                                            <td><?= $array['Car_id'] ?></td>
                                            <td><?= $array['Car_brand'] ?></td>
                                            <td><?= $array['Car_color'] ?></td>
                                            <td class="center">
                                                <a class="btn btn-info" href="car_view.php?mode=edit&id=<?=$array['Car_id']?>">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" href="car_save?mode=delete&id=<?=$array['Car_id']?>" onclick="return confirm('คุณต้องการลบข้อมูลนี่ ? ')">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>  
                                    <tr>
                                        <th style="text-align: center;" colspan="5"> ไม่พบข้อมูล</th>
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