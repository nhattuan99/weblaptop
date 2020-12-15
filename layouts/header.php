<!--<?php

$servername = "localhost";
$database = "weblaptop";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);
$conn->set_charset("utf8");
   
$sql = "select * from category";
$data = mysqli_query($conn, $sql);
?>-->

<!DOCTYPE html>
<html>
    <head>
        <link rel="icon" href="<?php echo base_url() ?>images/logo-nho.png" sizes="32x32">
        <title>Big Laptop</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        
        <script  src="<?php echo base_url() ?>public/frontend/s/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
        <script type="text/javascript" src="<?php echo base_url() ?>public/frontend/js/snow.js"></script>
        
    </head>
    <body class="nen">
        <div id="wrapper">
            <!---->
            <!--HEADER-->
            <div id="header">
                <div id="header-top">
                    <div class="container">
                        <div class="row clearfix">
                            <div class="col-md-6" id="header-text">
                                <a>Tuan & Thuc</a><b>Website bán laptop </b>
                            </div>
                            <div class="col-md-6">
                                <nav id="header-nav-top">
                                    <ul class="list-inline pull-right" id="headermenu">
                                        <?php if (isset($_SESSION['name_user'])): ?>
                                            <li style="color: red"> Xin chào: <?php echo $_SESSION['name_user'] ?></li>
                                            <li>
                                                <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                                <ul id="header-submenu">
                                                    <li><a href=""><i class="fa fa-address-card"></i>  Thông tin</a></li>
                                                    <li><a href="gio-hang.php"><i class="fa fa-cart-plus"></i>  Giỏ hàng</a></li>
                                                    <li><a href="thoat.php"><i class="fa fa-share-square-o"></i>  Thoát</a></li>
                                                </ul>
                                            </li>
                                            
                                        <?php else : ?>
                                            <li>
                                                <a href="dang-nhap.php"><i class="fa fa-lock"></i> Đăng nhập</a>
                                            </li>
                                            <li>
                                                <a href="dang-ky.php"><i class="fa fa-unlock"></i> Đăng ký</a>
                                            </li>
                                            <li>
                                                <a href="login/index.php"><i class="fa fa-user"></i> Admin  </a>
                                            </li>
                                        <?php endif ; ?>
                                       
                                        
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" id="header-main">
                        <div class="col-md-5">
                            <form class="form-inline" action="danh-muc-san-pham.php" method="POST">
                                <div class="form-group">
                                    <label>
                                        <select name="category" class="form-control">
                                            <?php $category= $db->fetchAll("category"); ?>
                                            <?php foreach($category as $item): ?>
                                            <option value="<?php echo $item['id'] ?>" > <?php echo $item['name']?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </label>
                                    <input type="text" name="keywork" placeholder=" Nhập từ khóa tìm kiếm" class="form-control">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4">
                            <a href="index.php">
                                 <img src="<?php echo base_url() ?>images/logo.png" height="120px" >
                            </a>
                        </div>
                        <div class="col-md-3" id="header-right">
                            <div class="pull-right">
                                <div class="pull-left">
                                    <i class="glyphicon glyphicon-phone-alt"></i>
                                </div>
                                <div class="pull-right">
                                    <p id="hotline">HOTLINE</p>
                                    <p>0342951729</p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END HEADER-->


            <!--MENUNAV-->
            <div id="menunav">
                <div class="container">
                    <nav>
                        <div class="home pull-left">
                            <a href="<?php echo base_url() ?>index.php">Trang chủ</a>
                        </div>
                        <!--menu main-->
                        <ul id="menu-main">
                            <li>
                                <a href="<?php echo base_url() ?>san-pham.php">Sản phẩm</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>thong-tin.php">Tin tức</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>gioi-thieu.php">Giới thiệu</a>
                            </li>
                            <!-- <li>
                                <a href="">Blog</a>
                            </li>
                            <li>
                                <a href="">About us</a>
                            </li> -->
                        </ul>
                        <!-- end menu main-->

                        <!--Shopping-->
                        <ul class="pull-right" id="main-shopping">
                            <li>
                                <a href="gio-hang.php"></i> Giỏ hàng </a>
                            </li>
                        </ul>
                        <!--end Shopping-->
                    </nav>
                </div>
            </div>
            <!--ENDMENUNAV-->
            
            <div id="maincontent">
                <div class="container">
                    <div class="col-md-3  fixside" >
                        <div class="box-left box-menu" >
                            <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                           <!-- <ul>
                                <li>
                                    <a href="">Macbook  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="">Dell  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                                 <li>
                                    <a href="">Hp  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                                 <li>
                                    <a href="">Acer  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>
                                 <li>
                                    <a href="">Asus  <span class="badge pull-right">14</span></a>
                                    <ul>
                                        <li><a href=""> Sonny 1</a></li>
                                        <li><a href=""> Sonny 2</a></li>
                                        <li><a href=""> Sonny 3</a></li>
                                        <li><a href=""> Sonny 4</a></li>
                                    </ul>
                                </li>

                            </ul>-->
                          <!--  <ul>
                                <?php if (isset($data)) {
                                 while (
                                $row = mysqli_fetch_assoc($data))
                                 {?>
                                <li><a href=""><?php echo $row['name']?></a></li>
                                <?php 
                                }
                            }?>
                            </ul>-->
                            <ul>
                                <?php foreach ($category as $item) :?>
                                <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                            <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-laptop"></i>  Sản phẩm mới </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                                <?php foreach ($productNew as $item) :?>
                                <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> <?php echo $item['name'] ?></p >
                                            <b class="price"><?php echo formatpricesale($item['price'],['sale']) ?>đ</b><br>
                                            <b class="sale"><?php echo formatPrice($item['price']) ?>đđ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                 <?php endforeach; ?>


                               
                            </ul>
                            <!-- </marquee> -->
                        </div>

                        <div class="box-left box-menu">
                            <h3 class="box-title"><i class="fa fa-warning"></i>  Mua nhiều </h3>
                           <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                            <ul>
                               <?php foreach ($productPay as $item) :?>
                                <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                        <img src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"> <?php echo $item['name'] ?></p >
                                            <b class="price"><?php echo formatpricesale($item['price'],['sale']) ?>đ</b><br>
                                            <b class="sale"><?php echo formatPrice($item['price']) ?>đđ</b><br>
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                                 <?php endforeach; ?>
                            </ul>
                            <!-- </marquee> -->
                        </div>
                    </div>