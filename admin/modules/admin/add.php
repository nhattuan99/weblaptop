<?php 
            $open = "admin";
            require_once __DIR__. "/../../autoload/autoload.php";
            /**
             * Danh sách danh mục sản phẩm
             */
            $data =
                    [
                      "name"          => postInput ('name'),
                      "email"          =>postInput("email"),
                      "phone"           => postInput("phone"),
                      "password"       => MD5(postInput("password")),
                      "address"        => postInput("address"),
                      "level"          => postInput("level")
                    ];
                 if($_SERVER["REQUEST_METHOD"]=="POST")
                  {
                    $error= [];

                    if(postInput('name')== '')
                    {
                      $error['name']= "Mời bạn nhập đầy đủ tên danh mục!!";
                    }
                    if(postInput('email')== '')
                    {
                      $error['email']= "Mời bạn nhập email!!";
                    }
                    else
                    {
                      $is_check=$db->fetchOne("admin", " email = '".$data['email']."' ");
                      if($is_check != NULL){
                        $error['email']= "Email đã tồn tại !!";
                      }
                    }
                     if(postInput('phone')== '')
                    {
                      $error['phone']= "Mời bạn nhập số điện thoại!!";
                    }
                     if(postInput('password')== '')
                    {
                      $error['password']= "Mời bạn nhập mật khẩu!!";
                    }
                     if(postInput('address')== '')
                    {
                      $error['address']= "Mời bạn nhập địa chỉ!!";
                    }

                    if($data['password'] != MD5(postInput("re_password")))
                    {
                      $error['password']=" Mật khẩu không khớp !!";
                    }
                    if(empty($error))
                    {
                          $id_insert =$db->insert("admin",$data);
                          if($id_insert)
                          {
                            $_SESSION['success']= "Thêm thành công!!";
                            redirectAdmin("admin");
                          }
                          else
                          {
                             $_SESSION['error']= "Thêm thất bại!!";
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
                            <a href="<?php echo modules("admin") ?>">Danh sách admin</a>
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
                        <i class="fa fa-fw fa-user-circle"></i>
                        Thêm mới admin</div></br>
                <div class="container">
                    
                      <section class="panel panel-default">
                    <div class="panel-heading"> 
                   
                    </div> 
                    <div class="panel-body">
                      
                    <form  class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                       <?php if(isset($_SESSION['error'])) :?>
                       <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                       </div>
                       <?php endif; ?>
            

                       <div class="right__inputWrapper">
                                    <label for="name" class="col-sm-8 control-label">Họ và tên</label>
                                    <div class="col-sm-4">
                                      <input type="text-center" class="form-control" id="InputHovaTen" placeholder="" name="name" value=" <?php echo $data['name'] ?>">
                                     <?php if(isset($error['name'])): ?>
                                     <p class="text-danger"><?php echo $error['name'] ?></p>
                                    <?php endif ?>
                                </div>
                                 <div class="right__inputWrapper">
                                    <label for="name" class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-4">
                                      <input type="email" class="form-control" id="InputEmail" placeholder="" name="email" value=" <?php echo $data['email'] ?>">
                                    <?php if(isset($error['email'])): ?>
                                    <p class="text-danger"> <?php echo $error['email'] ?></p>
                                   <?php endif ?>
                                 </div>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="name" class="col-sm-3 control-label"> Password</label>
                                    <div class="col-sm-4">
                                    <input type="password" class="form-control" id="InputPassword" name="password" placeholder="***************">
                                    <?php if(isset($error['password'])): ?>
                                     <p class="text-danger"><?php echo $error['password'] ?></p>
                                    <?php endif ?>
                                  </div>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="name" class="col-sm-12 control-label"> Nhập lại password</label>
                                    <div class="col-sm-4">
                                    <input type="password" class="form-control" id="InputrePW" name="re_password" placeholder="***************" required="">
                                    <?php if(isset($error['re_password'])): ?>
                                     <p class="text-danger"><?php echo $error['re_password'] ?></p>
                                    <?php endif ?>
                                  </div>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="name" class="col-sm-3 control-label"> Phone</label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" id="InputPhone" name="phone" placeholder="" value="<?php echo $data['phone'] ?>">
                                    <?php if(isset($error['phone'])): ?>
                                     <p class="text-danger"><?php echo $error['phone'] ?></p>
                                    <?php endif ?>
                                </div>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="name" class="col-sm-8 control-label"> Address </label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control" id="Inputaddress" name="address" placeholder="" value="<?php echo $data['address'] ?>">
                                     <?php if(isset($error['address'])): ?>
                                     <p class="text-danger"><?php echo $error['address'] ?></p>
                                    <?php endif ?>
                                  </div>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="name" class="col-sm-8 control-label"> Level </label>
                                    <div class="col-sm-4">
                                    <select class="form-control" name="level">
                                        <option value="1"> CTV</option>
                                        <option value="2"> Admin</option>
                                    </select>
                                     <?php if(isset($error['level'])): ?>
                                     <p class="text-danger"><?php echo $error['level'] ?></p>
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
