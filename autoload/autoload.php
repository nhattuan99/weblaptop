<?php 
			session_start();
			require_once __DIR__. "/../libraries/database.php";
            require_once __DIR__. "/../libraries/function.php";
			 $db= new database;

			 define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/weblaptop/public/uploads/");
			




			$category= $db->fetchAll("category");



			$sqlNew ="SELECT* FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
			$productNew =$db-> fetchsql($sqlNew);

			$sqlPay ="SELECT* FROM product WHERE 1 ORDER BY PAY DESC LIMIT 3";
			$productPay =$db-> fetchsql($sqlPay);
?>