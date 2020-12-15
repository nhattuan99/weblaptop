
    <?php  
    	require_once __DIR__. "/autoload/autoload.php"; 
    	$sum =0;
    	// _debug($_SESSION['cart']);

    	if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0)
    	{
    		 echo " <script>alert(' Không có sản phẩm trong giỏ hàng! ');location.href='index.php'</script>";
    	}
    	//_debug($_SESSION['cart']);
    ?>
    <?php   require_once __DIR__. "/layouts/header.php"; ?>

                    <div class="col-md-9 bor">


                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Giỏ hàng của bạn </a> </h3>
                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success" role="alert">
                                  <?php echo $_SESSION['success'] ;unset($_SESSION['success'])?>
                                </div>
                            <?php endif ?>
                           <table class="table table-hover" id="shoppingcart_info">
                            	<thead>
                            		<tr>
                            			<th>STT</th>
                            			<th>Tên sản phẩm</th>
                            			<th>Hình ảnh</th>
                            			<th>Số lượng</th>
                            			<th>Giá</th>
                            			<th>Tổng tiền</th>
                            			<th>Thao tác</th>
                            		</tr>
                            	</thead>
                            	<tbody>
                            		<?php $stt = 1; foreach ($_SESSION['cart'] as $key => $value): ?>
                            			
                            				<tr>
                            					<td><?php echo $stt ?></td>
                            					<td><?php echo $value['name'] ?></td>
                            					
                            					<td>
                            						<img src="<?php echo uploads() ?>product/<?php echo $value['thunbar'] ?>" width="80px" height="80px">
                            					</td>
                            					<td>
                            						<input type="number" name="qty" value="<?php echo $value['qty'] ?>"class="form-control qty" id="qty" min="0">
                            					</td>
                            					<td><?php echo formatPrice($value['price']) ?>đ</td>
                            					<td><?php echo formatPrice($value['price'] * $value['qty']) ?>đ</td>
                            					<td>
                            						<a href="" class="btn btn-xs btn-primary updatecart" data-key=<?php echo $key ?>><i class="fa fa-refresh"></i> Update</a>
                            						<a href="remove.php?id=<?php echo $key ?>" class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Remove</a>
                            					</td>
                            				</tr>
                            			<?php $sum += $value['price'] * $value['qty']; $_SESSION['tongtien'] =$sum ; ?>
                            			
                            		<?php $stt ++; endforeach ?>
                            		
                            	</tbody>
                            </table> 
                            <div class="col-md5 pull-right">
                            	<ul class="list-group">
                            		<li class="list-group-item">
                            			<h3> Thông báo đơn hàng </h3>
                            		</li>
                            		<li class="list-group-item">
                            			<span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>
                            			Số tiền
                            		</li>
                            		<li class="list-group-item">
                            			<span class="badge">10%</span>
                            			Thuế VAT
                            		</li>
                            		<!-- <li class="list-group-item">
                            			<span class="badge"><?php echo sale($_SESSION['tongtien']) ?></span>
                            			Giảm giá
                            		</li> -->
                            		<li class="list-group-item">
                            			<span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien'] * 110/100 ; echo formatPrice($_SESSION['total']) ?></span>
                            			Tổng tiền thanh toán
                            		</li>
                            		<li class="list-group-item">
                            			<a href="index.php"><b class="btn btn-primary">Tiếp tục mua hàng</b></a>
                            			<a href="thanh-toan.php"><b class="btn btn-warning" style="color: black" >Thanh toán</b></a>
                            		</li>
                            	</ul>
                            </div>
                           
                        <!-- noi dung -->
                        </section>

                    </div>
 
    <?php   require_once __DIR__. "/layouts/footer.php"; ?>
               