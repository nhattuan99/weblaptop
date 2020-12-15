
    <?php  
     require_once __DIR__. "/autoload/autoload.php"; 
     include_once __DIR__. "/layouts/header.php";
     // unset($_SESSION['cart']);
        /*_debug( $_SESSION['name_user']);*/
        $sqlHomeCate="SELECT name, id FROM category WHERE home = 1 ORDER BY updated_at ";
        /*$sqlHomeCate1="SELECT name,id FROM category limit 1 ";*/

        $CategoryHome= $db -> fetchsql($sqlHomeCate);
         /*$CategoryHome1= $db -> fetchsql($sqlHomeCate1);*/

 /*       if (empty($CategoryHome))
        $CategoryHome=$CategoryHome1;*/
        $data = [];

        foreach($CategoryHome as $product){
            $cateId = intval($product['id']);

            $sql = " SELECT * FROM product WHERE category_id = $cateId ";
            $ProductHome = $db -> fetchsql($sql);

            $data[$product['name']] = $ProductHome;
        }
        
        

     ?>
   
   

                    <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                            <img src="public/frontend/images/slide/noel_laptop.png" class="img-thumbnail">
                        </section>

                        <section class="box-main1" style="display: grid !important">
                              <?php foreach($data as $key => $value): ?>
                             <h3 class="title-main"><a href=""><?php echo $key ?></a> </h3>
                            
                                <div class="showitem" style="margin-top: 10px;margin-bottom:10px;">
                                <?php foreach ($value as $item): ?>
                                    
                                        <div class="col-md-3 item-product bor">
                                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                                <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                                            </a>
                                            <div class="info-item">
                                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                                    <p><strike class="sale"><?php echo formatPrice($item['price']) ?>đ</strike><b class="price"><?php echo formatpricesale($item['price'],['sale']) ?>đ</b></p>
                                            </div>
                                            <div class="hidenitem">
                                                <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
                                                <p><a href=""><i class="fa fa-heart"></i></a></p>
                                                <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                                            </div>
                                        </div>
                                     <?php endforeach ?>
                                 </div>
                            
                            <?php endforeach ?>
                           
                        </section>
                    </div>

                   
    <?php   require_once __DIR__. "/layouts/footer.php"; ?>

  
                                          
