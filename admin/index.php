            <?php 
           require_once __DIR__. "/autoload/autoload.php";?>
            
           <!-- <?php
           $category=$db->fetchAll("category");
            
            if(isset($_GET['page'])){
                $p=$_GET['page'];
            }
            else{
                $p=1;
            }

           $sql="SELECT product.*, category.name as namecate FROM product LEFT JOIN category on category.id 
           = product.category_id";

           $product=$db->fetchJone($product,$sql,$p,2,false);
           if(isset($product['page'])){
               $sotrang=$product['page'];
               unset($product['page']);
           }
            ?> -->

            <?php  
            require_once __DIR__. "/layouts/header.php";
            ?>


        <tbody>
         <?php $stt=1; foreach($product as $item): ?>
         <tr>
             <td><?php echo $stt ?></td>
             <td><?php echo $item['name'] ?></td>
             <td><?php echo $item['namecate'] ?></td>
             <td>
                 <!-- <img src="<?php echo upload() ?>  product/<?php echo $item['thunbar']?>" width="80px" height="80px"> -->
             </td>
             <td><?php echo $item['slug'] ?></td>
             <td>
                 <ul>
                     <li> Giá: <?php echo $item['price'] ?></li>
                     <li> Số lượng : <?php echo $item['number'] ?></li>
                 </ul>
             </td>
             <td>
                 <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-edit"></i> Sửa</a>
                 <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"> <i class="fa fa-times"></i> Xóa</a>
             </td>
         </tr>
         <?php $stt++; endforeach ?> -->
     </tbody>
            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo base_url() ?>admin">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                    

                    <!-- <?php  var_dump($category);  ?> -->
                    


                    
                </div>
                <!-- /.container-fluid -->
                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                             <span style="font-size: 20px">Shop Laptop Đây!</span>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /.content-wrapper -->
        </div>
        

         <?php  
         require_once __DIR__. "/layouts/footer.php";
         ?>
