<?php  
    	require_once __DIR__. "/autoload/autoload.php"; 
    	//$key = intval(getInput('key'));
    	if(isset($_GET['id']))
    	{
    		$key=$_GET['id'];
//print_r($_SESSION['cart'][$key]);

    		unset($_SESSION['cart'][$key]);
    	   $_SESSION['success'] = " Xóa sản phẩm thành công! ";

    	}
    	else
    	{
    	 $_SESSION['error'] = " Xóa sản phẩm không thành công! ";

    	}

    	header("location:gio-hang.php");
?>