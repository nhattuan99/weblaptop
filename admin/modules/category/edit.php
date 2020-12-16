            <?php 
            $open = "category";
            require_once __DIR__. "/../../autoload/autoload.php";

            $id =intval(getInput('id'));
            
            $Editcategory= $db->fetchID("category",$id);
            
                if(empty($Editcategory))
                {
                  $_SESSION['error'] =" Dữ liệu không tồn tại!!!";
                  redirectAdmin("category");
                }

                 if($_SERVER["REQUEST_METHOD"]=="POST")
                  { 
                     $data =
                    [
                      "name" => postInput ('name'),
                      "slug" => to_slug(postInput("name"))
                    ];

                    $error= [];

                    if(postInput('name')== '')
                    {
                      $error['name']= "Mời bạn nhập đầy đủ tên danh mục!!";
                    }

                    if(empty($error))
                    {
                            if($Editcategory['name'] != $data['name'])
                            {
                                  $isset=$db->fetchOne("category"," name = '".$data['name']."' ");
                                   if(count($isset)>0)
                                    {
                                          $_SESSION['error']= "Tên danh mục đã tồn tại!! ";
                                    }
                                    else
                                    {
                                         $id_update= $db->update("category",$data,array("id"=>$id));
                                          if($id_update >0 )
                                          {
                                            $_SESSION['success']= "Cập nhật thành công!! ";
                                            redirectAdmin("category");
                                          }
                                          else
                                          {
                                            $_SESSION['error']= "Dữ liệu không thay đổi!! ";
                                            redirectAdmin("category");
                                          }
                                    }
                            }
                            else
                            {
                                          $id_update= $db->update("category",$data,array("id"=>$id));
                                          if($id_update >0 )
                                          {
                                            $_SESSION['success']= "Cập nhật thành công!! ";
                                            redirectAdmin("category");
                                          }
                                          else
                                          {
                                            $_SESSION['error']= "Dữ liệu không thay đổi!! ";
                                            redirectAdmin("category");
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
                            <a href="<?php echo modules("category") ?>">Danh sách danh mục</a>
                        </li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>

                <div class="clearfix"></div>
                     <?php if(isset($_SESSION['error'])) :?>
                       <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                       </div>
                       <?php endif; ?>

        
                <div class="row">
                    <div class="col-md-4">
                        <form class="form-horizontal" action="" method="POST">
                              <div class="form-group" >
                                <label for="exampleInputEmail1" style="font-size:30px ">Tên danh mục</label>
                                <input type="text-center" class="form-control" id="InputDanhmuc" aria-describedby="emailHelp" placeholder="Tên danh mục" name="name" value="<?php echo $Editcategory['name'] ?>">
                              </div>

                              <?php if(isset($error['name'])): ?>
                                <p class="text-danger"><?php echo $error['name'] ?></p>
                             <?php endif ?>

                             <div class="form-group">
                                <div class="col-md-offset-12 col-md-10">
                                  <button type="submit" class="btn btn-success">Lưu</button>
                                 </div>
                              </div>
                            </form>                   
                     </div>
                </div>

                    




        

         <?php  
         require_once __DIR__. "/../../layouts/footer.php";
         ?>
