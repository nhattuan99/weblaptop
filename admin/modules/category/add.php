            <?php 
            $open = "category";
            require_once __DIR__. "/../../autoload/autoload.php";

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
                      $isset=$db->fetchOne("category"," name = '".$data['name']."' ");
                      if(count($isset)>0)
                      {
                         $_SESSION['error']= "Tên danh mục đã tồn tại!! ";
                      }
                      else
                      {
                        $id_insert= $db->insert("category",$data);
                        if($id_insert >0 )
                        {
                          $_SESSION['success']= "Thêm mới thành công!! ";
                          redirectAdmin("category");
                        }
                        else
                        {
                          $_SESSION['error']= "Thêm mới thất bại!! ";
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
                              <div class="card-header">
                        <i class="fas fa-fw fa-folder"></i>
                        Thêm mới danh mục</div></br>



                <div class="container">
                    
                      <section class="panel panel-default">
                    <div class="panel-heading"> 
                   
                    </div> 
                    <div class="panel-body">
                      
                    <form  class="form-horizontal" role="form" method="POST">

            

                    <!-- form-group // -->
                      <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Tên danh mục</label>
                        <div class="col-sm-4">
                         <input type="text-center" class="form-control" id="InputDanhmuc" aria-describedby="emailHelp" placeholder="Tên danh mục" name="name">
                                <?php if(isset($error['name'])): ?>
                                <p class="text-danger"><?php echo $error['name'] ?></p>
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
