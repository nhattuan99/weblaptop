            <?php 
            $open = "transaction";
            require_once __DIR__. "/../../autoload/autoload.php";

            
             ?>
            <?php  
            require_once __DIR__. "/../../layouts/header.php";
            ?>
            <?php $sql="SELECT transaction.* , users.name as nameuser , users.phone as phoneuser  FROM transaction LEFT JOIN users ON users_id = transaction.users_id ORDER BY ID DESC ;"?>
            <?php $transaction= $db->fetchAll123($sql); ?>

            <?php if (isset($transaction['page'])) {
                $sotrang=$transaction['page'];
                unset($transaction['page']);
            } ?>
<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo modules("transaction") ?>">Danh sách đơn hàng</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <div class="clearfix"></div>
        <?php if(isset($_SESSION['success'])) :?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

            <?php if(isset($_SESSION['error'])) :?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- DataTables Example -->
        <div class="card mb-3">
        
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>SĐT</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php $stt=1; foreach ($transaction as $item): ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $item['nameuser'] ?></td>
                                <td><?php echo $item['phoneuser'] ?></td>
                                <td>
                                    <a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] == 0 ? "btn-danger" : "btn-primary"?> "><?php echo $item['status'] == 0 ? "Chưa xử lý" : "Đã xử lý"?></a>
                                </td>
                                <td>
                                
                                    <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i>Xóa</a>
                                </td>


                            </tr>
                            <?php $stt++; endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <p class="small text-center text-muted my-5">
            <em>More table examples are coming soon ...</em>
        </p>
    </div>
    <!-- /.container-fluid -->
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span></span>
            </div>
        </div>
    </footer>
</div>

<?php  
   require_once __DIR__. "/../../layouts/footer.php";
    ?>