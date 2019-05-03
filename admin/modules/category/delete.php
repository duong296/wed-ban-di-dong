<?php 
	$open = "category";
	require_once __DIR__. "/../../autoload/autoload.php" ;
	$id = intval(getInput('id'));


    $num = $db->delete("category",$id);
    if ($num > 0)
    {
    	 $_SESSION['success']= "xóa thành công";
    	 redirectAdmin("category");
    }
    else{
    	 $_SESSION['error']= "xóa thất bại ";
                     redirectAdmin("category");
    }
 ?> 