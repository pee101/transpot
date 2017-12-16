<?php include "head.php"; ?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> ข้อมูลประเภทสินค้า</h2>
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
                    <div class="col-md-6">
                        <div class="pull-right">
                            <a class="btn btn-success" href="category_view.php">
                                <i class="glyphicon glyphicon-plus "></i> เพื่มข้อมูล
                            </a>
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-10">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">รหัส</th>
                                    <th class="text-center">ชื่อประเภท</th>
                                    <th class="text-center">จัดการข้อมูล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $n = 0;
                                $sql = "select * from Category where Cat_id like '%".$_GET['search']."%' or Cat_name like '%".$_GET['search']."%' order by Cat_id asc";
                                $query = mysqli_query($connect, $sql);
                                $num = mysqli_num_rows($query);
                                if ($num > 0) {
                                    while ($array = mysqli_fetch_array($query)) {
                                        $n++;
                                        ?>
                                        <tr>
                                            <td><?= $n; ?></td>
                                            <td><?= $array['Cat_id'] ?></td>
                                            <td><?= $array['Cat_name'] ?></td>
                                            <td class="center">
                                                <a class="btn btn-info" href="category_view.php?mode=edit&id=<?=$array['Cat_id']?>">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </a>
                                                <a class="btn btn-danger" href="category_save?mode=delete&id=<?=$array['Cat_id']?>" onclick="return confirm('คุณต้องการลบข้อมูลนี่ ? ')">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>  
                                    <tr>
                                        <th style="text-align: center;" colspan="4"> ไม่พบข้อมูล</th>
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