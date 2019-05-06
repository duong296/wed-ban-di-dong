<?php 
	$open = "category";
	require_once __DIR__. "/../../autoload/autoload.php" ;
	$id = intval(getInput('id'));


    $num = $db->delete("product",$id);
    if ($num > 0)
    {
    	 $_SESSION['success']= "xóa thành công";
    	 redirectAdmin("product");
    }
    else{
    	 $_SESSION['error']= "xóa thất bại ";
                     redirectAdmin("product");
    }
 ?> 