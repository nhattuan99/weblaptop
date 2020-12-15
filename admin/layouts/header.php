<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo base_url() ?>images/logo-nho.png" sizes="32x32">
        <title>Admin Big Laptop</title>
        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url() ?>public/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Page level plugin CSS-->
        <link href="<?php echo base_url() ?>public/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
        <!-- Custom styles for this template-->
        <link href="<?php echo base_url() ?>public/admin/css/sb-admin.css" rel="stylesheet">
        <script type="text/javascript" src="<?php echo base_url() ?>public/admin/js/snow.js"></script>
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

          <img src="/weblaptop/images/logo.png" height="70" >



            <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
            </button>
            <a class="navbar" href="index.php" style="color: white"> <H4> Admin: <?php echo $_SESSION['admin_name'] ?></H4> </a>
            <!-- Navbar Search -->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!-- Navbar -->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <span class="badge badge-danger">9+</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <span class="badge badge-danger">7</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="<?php echo base_url() ?>dang-xuat.php" data-toggle="modal" data-target="#logoutModal">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </nav>



 		<div id="wrapper">
            <!-- Sidebar -->
            <ul class="sidebar navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url() ?>admin">
                    <i class="fa fa-home" aria-hidden="true"></i>

                    


                    <span> Home</span>
                    </a>
                </li>

                <li class="nav-item active" class="<?php echo isset($open) && $open == 'category' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo modules("category") ?>">
                    <i class="fas fa-fw fa-folder"></i>
                    <span> Danh mục sản phẩm</span>
                    </a>
                </li>
                 <li class="nav-item active" class="<?php echo isset($open) && $open == 'product' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo modules("product") ?>">
                    <i class="fa fa-fw fa-laptop"></i>
                    <span> Sản phẩm</span>
                    </a>
                </li>
                <li class="nav-item active" class="<?php echo isset($open) && $open == 'admin' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo modules("admin") ?>">
                    <i class="fa fa-fw fa-user-circle"></i>
                    <span> Admin</span>
                    </a>
                </li>
                 <li class="nav-item active" class="<?php echo isset($open) && $open == 'user' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo modules("user") ?>">
                    <i class="fa fa-fw fa-user"></i>
                    <span> Thành viên</span>
                    </a>
                </li>
                  <li class="nav-item active" class="<?php echo isset($open) && $open == 'transaction' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?php echo modules("transaction") ?>">
                    <i class="fa fa-fw fa-file "></i>
                    <span> Quản lý đơn hàng</span>
                    </a>
                </li>
            </ul>



       