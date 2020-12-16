            <?php 
           // print_r($_POST);
            $open = "product";
            require_once __DIR__. "/../../autoload/autoload.php";
            /**
             * Danh sách danh mục sản phẩm
             */
            $product=$db->fetchAll("category");
                 if($_SERVER["REQUEST_METHOD"]=="POST")
                  { 
                    $data =
                    [
                      "name"          => postInput ('name'),
                      "slug"          => to_slug(postInput("name")),
                      "category_id"   => postInput("category_id"),
                      "price"         => postInput("price"),
                      "number"        => postInput("number"),
                      "content"       => postInput("content")
                    ];
                  //  print_r($data);exit;
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
                    if(! isset($_FILES['thunbar']))
                    {
                      $error['thunbar']= "Mời bạn chọn hình ảnh!!";
                    }
           //         print_r($_FILES);
//print_r($error);
                    if(empty($error))
                    {
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
                       }

                     //  print_r($data);
                          $id_insert =$db->insert("product",$data);
                          if($id_insert)
                          {
                            move_uploaded_file($file_tmp,$part.$file_name);
                            $_SESSION['success']= "Thêm mới thành công!!";
                            redirectAdmin("product");
                          }
                          else
                          {
                             $_SESSION['error']= "Thêm mới thất bại!!";
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
                        <div class="col-sm-5">
                          <select class="form-control col-sm-9" name="category_id" >
                            <option value="">- Mời bạn chọn danh mục sản phẩm -</option>
                            <?php foreach ($product as $item): ?>
                              <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                            <?php endforeach ?>
                          </select>
                          <?php if(isset($error['category_id'])): ?>
                          <p class="text-danger"><?php echo $error['category_id'] ?></p>
                          <?php endif ?>
                        </div>
                      </div> <!-- form-group // -->
                        <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tên sản phẩm</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Tên sản phẩm">
                          <?php if(isset($error['name'])): ?>
                           <p class="text-danger"><?php echo $error['name'] ?></p>
                          <?php endif ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Giá sản phẩm</label>
                        <div class="col-sm-4">
                          <input type="number" class="form-control" name="price" id="name" placeholder="9.xxx.xxx">
                          <?php if(isset($error['price'])): ?>
                           <p class="text-danger"><?php echo $error['price'] ?></p>
                          <?php endif ?>
                        </div>
                      </div> 
                       <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Số lượng</label>
                        <div class="col-sm-4">
                          <input type="number" class="form-control" name="number" id="name" placeholder="0" >
                          <?php if(isset($error['number'])): ?>
                           <p class="text-danger"><?php echo $error['number'] ?></p>
                          <?php endif ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Giảm giá</label>
                        <div class="col-sm-4">
                          <input type="number" class="form-control" name="sale" id="name" placeholder="10%" value="0">
                          <?php if(isset($error['sale'])): ?>
                           <p class="text-danger"><?php echo $error['sale'] ?></p>
                          <?php endif ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Hình ảnh</label>
                        <div class="col-sm-4">
                          <label class="control-label small" for="file_img">Loại ảnh (jpg/png):</label> <input type="file" name="thunbar">
                          <?php if(isset($error['thunbar'])): ?>
                           <p class="text-danger"><?php echo $error['thunbar'] ?></p>
                           <?php endif ?>
                        </div>
                      </div>
                        <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Nội dung</label>
                        <div class="col-sm-4">
                          <textarea class="form-control" name="content" cols="30" rows="10"></textarea>
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
