<?php 
            $open = "product";
            require_once __DIR__. "/../../autoload/autoload.php";
            


            $id =intval(getInput('id'));
            $product=$db->fetchAll("product",$id);
            $Editproduct= $db->fetchID("product",$id);
            
                if(empty($Editproduct))
                {
                  $_SESSION['error'] =" Dữ liệu không tồn tại!!!";
                  redirectAdmin("product");
                }


                 if($_SERVER["REQUEST_METHOD"]=="POST")
                  { 
                    $data =
                    [
                      "name"          => postInput ('name'),
                      "slug"          => to_slug(postInput("name")),
                      "category_id"   => postInput("category_id"),
                      "price"         => postInput("price"),
                      "number"        => postInput("number"),
                      "content"       => postInput("content"),
                      "sale"          => postInput("sale")
                    ];
                    $error= [];

                    if(postInput('name')== '')
                    {
                      $error['name']= "Mời bạn nhập đầy đủ tên danh mục!!";
                    }
                    if(postInput('category_id')== '')
                    {
                      $error['category_id']= "Mời bạn chọn tên danh mục!!";
                    }
                     if(postInput('price')== '')
                    {
                      $error['price']= "Mời bạn nhập giá sản phẩm!!";
                    }
                     if(postInput('content')== '')
                    {
                      $error['content']= "Mời bạn nhập nội dung sản phẩm!!";
                    }
                     if(postInput('number')== '')
                    {
                      $error['number']= "Mời bạn nhập số lượng sản phẩm!!";
                    }
                    
                    if(empty($error)){
                        if(isset($_FILES['thunbar']))
                      {
                            $file_name = $_FILES['thunbar']['name'];
                            $file_tmp = $_FILES['thunbar']['tmp_name'];
                            $file_type = $_FILES['thunbar']['type'];
                            $file_erro = $_FILES['thunbar']['error'];

                            if($file_erro == 0)
                            {
                              $part = ROOT ."product/";
                              $data['thunbar'] = $file_name;
                            }
                            $update=$db->update("product",$data, array("id"=>$id));
                            if($update >0){
                              move_uploaded_file($file_tmp,$part.$file_name);
                              $_SESSION['success']= "Cập nhật thành công!!";
                              redirectAdmin("product");
                            }
                            else{
                              $_SESSION['success']= "Cập nhật thất bại!!";
                              redirectAdmin("product");
                            }
                    }
              }
        }
?>
<?php  
            require_once __DIR__. "/../../layouts/header.php";
            ?>

            <div id="content-wrapper">
                <div class="container-fluid">
                    <!-- Breadcrumbs-->
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo modules("category") ?>">Danh sách sản phẩm</a>
                        </li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>

              <div class="clearfix"></div>
                     <?php if(isset($_SESSION['error'])) :?>
                       <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                       </div>
                       <?php endif; ?>
                 <div class="card-header">
                        <i class="fab fa-fw fa-apple"></i>
                        Thêm mới sản phẩm</div></br>
                <div class="container">
                    
                      <section class="panel panel-default">
                    <div class="panel-heading"> 
                   
                    </div> 
                    <div class="panel-body">
                      
                    <form  class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">

            

                       <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Danh mục sản phẩm</label>
                        <div class="col-sm-9">
                          <select class="form-control col-sm-9" name="category_id" >
                              <option value=""> ! Mời bạn nhập danh mục sản phẩm !</option>
                                    <?php $category= $db->fetchAll("category"); ?>
                                    <?php foreach($category as $item): ?>
                                    <option value="<?php echo $item['id'] ?>" > <?php echo $item['name'] ?></option>
                                    <?php endforeach ?>
                          </select>
                            <?php if(isset($error['category_id'])) : ?>
                                    <p class="text-danger"> <?php echo $error['category_id'] ?></p>
                            <?php endif ?>
                        </div>
                      </div> <!-- form-group // -->
                        <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tên sản phẩm</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Tên sản phẩm" value=" <?php echo $Editproduct['name'] ?>">
                          <?php if(isset($error['name'])): ?>
                                    <p class="text-danger"> <?php echo $error['name'] ?></p>
                              <?php endif ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Giá sản phẩm</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="price" id="name" placeholder="9.xxx.xxx" value=" <?php echo $Editproduct['price'] ?>">
                          <?php if(isset($error['price'])): ?>
                           <p class="text-danger"><?php echo $error['price'] ?></p>
                          <?php endif ?>
                        </div>
                      </div> 
                       <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Số lượng</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="number" id="name" placeholder="0" value=" <?php echo $Editproduct['number'] ?>">
                          <?php if(isset($error['number'])): ?>
                           <p class="text-danger"><?php echo $error['number'] ?></p>
                          <?php endif ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Giảm giá</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="sale" id="name" placeholder="10%" value=" <?php echo $Editproduct['sale'] ?>">
                          <?php if(isset($error['sale'])): ?>
                           <p class="text-danger"><?php echo $error['sale'] ?></p>
                          <?php endif ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Hình ảnh</label>
                        <div class="col-sm-3">
                          <label class="control-label small" for="file_img">Loại ảnh (jpg/png):</label> <input type="text" name="thunbar" value=" <?php echo $Editproduct['thunbar'] ?>">
                          <?php if(isset($error['thunbar'])): ?>
                           <p class="text-danger"><?php echo $error['thunbar'] ?></p>
                           <?php endif ?>
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nội dung</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" name="content" cols="30" rows="10"><?php echo $Editproduct['content'] ?></textarea>
                          <?php if(isset($error['content'])): ?>
                           <p class="text-danger"><?php echo $error['content'] ?></p>
                          <?php endif ?>
                        </div>
                      </div> 
                       <!-- form-group // -->
                      <hr>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-success">Lưu</button>
                        </div>
                      </div> <!-- form-group // -->
                    </form>
                      
                    </div><!-- panel-body // -->
                    </section><!-- panel// -->

                      
                    </div> <!-- container// -->


               

                    




        

         <?php  
         require_once __DIR__. "/../../layouts/footer.php";
         ?>
