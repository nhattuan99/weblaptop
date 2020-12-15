
    <?php   
        require_once __DIR__. "/autoload/autoload.php";
        if(isset($_SESSION['name_id']))
        {
             echo " <script>alert(' Bạn đã có tài khoản nên không thể vào đây! ');location.href='index.php'</script>";
        }
        $conn = mysqli_connect("localhost","root","","weblaptop");
        mysqli_set_charset($conn, "utf8");


        $name = $email = $password = $address = $phone = '';

       /* $data = 
        [
            'name'      =>   postInput("name"),
            'email'     =>   postInput("email"),
            'password'  =>   md5(postInput("password")),
            'address'   =>   postInput("address"),
            'phone'     =>   postInput("phone"),
        ];*/
        $error = [];
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            if (isset($_POST['name']) && $_POST['name'] != NULL) 
            {
                $name = $_POST['name'];
            }
            if ($name == '') 
            {
                 $error['name'] = " Tên không được để trống ! ";
            }

               if (isset($_POST['email']) && $_POST['email'] != NULL) 
            {
                $email = $_POST['email'];
            }
            if ($email == '') 
            {
                 $error['email'] = " Email không được để trống ! ";
            }
            else
            {
                $is_check = $db->fetchOne("users","email = '".$email."' ");
                if($is_check != NULL)
                {
                    $error['email'] = "Email đã tồn tại mời bạn nhập địa chỉ email khác! ";
                }

            }

               if (isset($_POST['password']) && $_POST['password'] != NULL) 
            {
                $password = $_POST['password'];
            }
            if ($password == '') 
            {
                 $error['password'] = " Mật khẩu không được để trống ! ";
            }

               if (isset($_POST['phone']) && $_POST['phone'] != NULL) 
            {
                $phone = $_POST['phone'];
            }
            if ($phone == '') 
            {
                 $error['phone'] = " Số điện thoại không được để trống ! ";
            }

               if (isset($_POST['address']) && $_POST['address'] != NULL) 
            {
                $address = $_POST['address'];
            }
            if ($address == '') 
            {
                 $error['address'] = " Địa chỉ không được để trống ! ";
            }

            //kiem tra error

            if(empty($error))
            {

                /*echo "$name,$email,$password,$phone,$address";*/
                $sql="INSERT INTO users(name,email,password,phone,address) VALUES ('".$name."','".$email."','".md5($password)."','".$phone."','".$address."');";
                $insert = mysqli_query($conn,$sql) or die("Thêm mới thất bại!");
                if($insert > 0)
                {
                    $_SESSION['success'] = " Đăng ký thành công! Mời bạn đăng nhập !";
                    header("location: dang-nhap.php");
                }
                else
                {
                    /*echo " Đăng ký thất bại! ";*/
                }
            }

        }
   

     ?>
    <?php   require_once __DIR__. "/layouts/header.php"; ?>

                    <div class="col-md-9 bor">


                        <section class="box-main1">
                            <h3 class="title-main"><a href="dang-ky.php"> Đăng ký thành viên </a> </h3><br>

                            <form action="" method="POST" class="form-horizontal" role="form" style="margin-top:20px ">
                                <div class="form-group">
                                <img src="images/biglaptop1.gif" height="150px" class="col-md-offset-5">
                            </div>
                            <div class="form-group">
                            	<label class="col-sm-3 control-label"> Tên thành viên </label>
                            	<div class="col-md-8">
                            		<input type="text" name="name" placeholder=" Mời bạn nhập tên " class="form-control" value="<?php echo $name ?>">
                                    <?php if (isset($error['name'])): ?>
                                        <p class="text-danger"><?php echo $error['name'] ?></p>
                                    <?php endif ?>
                            	</div>
                            </div>
                             <div class="form-group">
                            	<label class="col-sm-3 control-label"> Email </label>
                            	<div class="col-md-8">
                            		<input type="email" name="email" placeholder=" Email@gmail.com " class="form-control" value="<?php echo $email ?>">
                                     <?php if (isset($error['email'])): ?>
                                        <p class="text-danger"><?php echo $error['email'] ?></p>
                                    <?php endif ?>
                            	</div>
                            </div>
                               <div class="form-group">
                            	<label class="col-sm-3 control-label"> Mật khẩu </label>
                            	<div class="col-md-8">
                            		<input type="password" name="password" placeholder=" *********** " class="form-control" value="<?php echo $password ?>">
                                     <?php if (isset($error['password'])): ?>
                                        <p class="text-danger"><?php echo $error['password'] ?></p>
                                    <?php endif ?>
                            	</div>
                            </div>
                              	<div class="form-group">
                            	<label class="col-sm-3 control-label"> Số điện thoại </label>
                            	<div class="col-md-8">
                            		<input type="number" name="phone" placeholder=" 034295**** " class="form-control" value="<?php echo $phone ?>">
                                     <?php if (isset($error['phone'])): ?>
                                        <p class="text-danger"><?php echo $error['phone'] ?></p>
                                    <?php endif ?>
                            	</div>
                            </div>
                               <div class="form-group">
                            	<label class="col-sm-3 control-label"> Địa chỉ </label>
                            	<div class="col-md-8">
                            		<input type="text" name="address" placeholder=" 180 Đường Cao Lỗ, Phường 4, Quận 8, Thành phố Hồ Chí Minh" class="form-control" value="<?php echo $address ?>">
                                     <?php if (isset($error['address'])): ?>
                                        <p class="text-danger"><?php echo $error['address'] ?></p>
                                    <?php endif ?>
                            	</div>
                            </div>
                            <button type="submit" class="btn btn-success col-sm-2 col-md-offset-5" style="margin-bottom: 20px">Đăng ký</button>
                            </form>
                           
                        <!-- noi dung -->
                        </section>

                    </div>
 
    <?php   require_once __DIR__. "/layouts/footer.php"; ?>

               