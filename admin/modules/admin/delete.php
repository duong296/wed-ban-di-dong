<?php 
	$open = "category";
	require_once __DIR__. "/../../autoload/autoload.php" ;
	$id = intval(getInput('id'));


    $num = $db->delete("admin",$id);
    if ($num > 0)
    {
    	 $_SESSION['success']= "xóa thành công";
    	 redirectAdmin("admin");
    }
    else{
    	 $_SESSION['error']= "xóa thất bại ";
                     redirectAdmin("admin");
    }
 ?> 