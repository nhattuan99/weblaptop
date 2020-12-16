<?php 

	 
            require_once __DIR__. "/../../autoload/autoload.php";
            /**
             * Danh sách danh mục sản phẩm
             */
            
            $id =intval(getInput('id'));
            $Edittransaction= $db->fetchID("transaction",$id);
            
                if(empty($Edittransaction))
                {
                  $_SESSION['error'] =" Dữ liệu không tồn tại!!!";
                  redirectAdmin("transaction");
                }
               if($Edittransaction['status'] == 1)
               {
               	 $_SESSION['error'] =" Đơn hàng đã được xử lý rồi!!!";
                  redirectAdmin("transaction");
               }
             $status = 1;



            $update = $db->update("transaction", array("status" => $status), array("id" => $id));

            if($update >0 )
            {
                $_SESSION['success']= "Cập nhật thành công!! ";
                $sql = " SELECT product_id,qty FROM orders WHERE transaction_id = $id";
                $order = $db->fetchsql($sql);
                foreach ($order as $item) {
                	$idproduct = intval($item['product_id']);
                	$product = $db-> fetchID("product",$idproduct);
                	$number = $product['number'] - $item['qty'];
                	// _debug($number);
                	$up_pro = $db->update("product", array("number"=>$number,"pay"=>$product['pay']+1 ),array("id"=>$idproduct));
                }
                
                // _debug($Order);die;


                redirectAdmin("transaction");
            }
            else
            {
                $_SESSION['error']= "Dữ liệu không thay đổi!! ";
                redirectAdmin("transaction");
             }


 ?>