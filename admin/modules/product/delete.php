            <?php 
            $open = "category";
            require_once __DIR__. "/../../autoload/autoload.php";

            $id =intval(getInput('id'));
            
            $Editcategory= $db->fetchID("product",$id);
            
                if(empty($Editcategory))
                {
                  $_SESSION['error'] =" Dữ liệu không tồn tại!!!";
                  redirectAdmin("product");
                }

                $num=$db->delete("product",$id);
                if($num>0)
                {
                  $_SESSION['success']= "Xóa thành công!! ";
                        redirectAdmin("product");
                }
                else
                {
                  $_SESSION['error']= "Xóa thất bại!! ";
                        redirectAdmin("product");
                }
             ?>

          