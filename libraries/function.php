<?php 
	/**
	* get input
	*/
    function getInput($string)
    {
        return isset($_GET[$string]) ? $_GET[$string] : '';
    }

	/**
	* post input
	*/
	function postInput($string)
	{
		return isset($_POST[$string]) ? $_POST[$string] : '';
	}



        function  base_url()
        {
        	return $url = "http://localhost/didong/";
        }

        function public_admin()
        {
        	return base_url()."public/admin/";
        }

        function modules($url)
        {
        	return base_url()."admin/modules/" .$url;
        }
     

	if( ! function_exists('redirectAdmin'))
        {
            function redirectAdmin($url= "")
            {
                header("location:".base_url()."admin/modules/{$url}");exit();
            }
        }
?>

