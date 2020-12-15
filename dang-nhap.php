
    <?php   
        require_once __DIR__. "/autoload/autoload.php"; 
        $conn = mysqli_connect("localhost","root","","weblaptop");
        mysqli_set_charset($conn, "utf8");


        $email = $password = '';

       /* $data = 
        [
            
            'email'     =>   postInput("email"),
            'password'  =>   md5(postInput("password")),
            
        ];*/
        $error = [];
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            

            if (isset($_POST['email']) && $_POST['email'] != NULL) 
            {
                $email = $_POST['email'];
            }
            if ($email == '') 
            {
                 $error['email'] = " Email không được để trống ! ";
            }

            if (isset($_POST['password']) && $_POST['password'] != NULL) 
            {
                $password = $_POST['password'];
            }
            if ($password == '') 
            {
                 $error['password'] = " Mật khẩu không được để trống ! ";
            }


            //kiem tra error

            if(empty($error))
            {

                $is_check = $db->fetchOne("users","email = '".$email."' AND password = '".md5($password)."' ");
               /* _debug($is_check);*/
                if($is_check != NULL)
                {
                    $_SESSION['name_user'] = $is_check['name'];
                    $_SESSION['name_id'] = $is_check['id'];
                    echo " <script>alert(' Đăng nhập thành công! ');location.href='index.php'</script>";
                }
                else
                {
                    $_SESSION['error'] = " Đăng nhập thất bại! ";
                }
            }

        }
   

     ?>
    <?php   require_once __DIR__. "/layouts/header.php"; ?>

                    <div class="col-md-9 bor">


                        <section class="box-main1">
                            <h3 class="title-main"><a href="dang-nhap.php"> Đăng nhập </a> </h3>
                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success" role="alert">
                                  <?php echo $_SESSION['success'] ;unset($_SESSION['success'])?>
                                </div>
                            <?php endif ?>
                             <?php if (isset($_SESSION['error'])): ?>
                                <div class="alert alert-danger" role="alert">
                                  <?php echo $_SESSION['error'] ;unset($_SESSION['error'])?>
                                </div>
                            <?php endif ?>
                             <form action="" method="POST" class="form-horizontal" role="form" style="margin-top:20px ">
                            <div class="form-group">
                                <img src="images/biglaptop.gif" height="120px" class="col-md-offset-5">
                            </div>
                             <div class="form-group">
                            	<label class="col-sm-3 control-label"> Email </label>
                            	<div class="col-md-8">
                            		<input type="email" name="email" placeholder=" nhat********@gmail.com " class="form-control">
                                    <?php if (isset($error['email'])): ?>
                                        <p class="text-danger"><?php echo $error['email'] ?></p>
                                    <?php endif ?>
                            	</div>
                            </div>
                               <div class="form-group">
                            	<label class="col-sm-3 control-label"> Mật khẩu </label>
                            	<div class="col-md-8">
                            		<input type="password" name="password" placeholder=" *********** " class="form-control">
                                    <?php if (isset($error['password'])): ?>
                                        <p class="text-danger"><?php echo $error['password'] ?></p>
                                    <?php endif ?>
                            	</div>
                            </div>
                              	
                            <button type="submit" class="btn btn-success col-sm-2 col-md-offset-5" style="margin-bottom: 20px">Đăng nhập</button>
                            </form>
                           
                        <!-- noi dung -->
                        </section>

                    </div>
 
    <?php   require_once __DIR__. "/layouts/footer.php"; ?>
   
               