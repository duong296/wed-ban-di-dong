<?php 
	/**
	* get input
	*/

	/**
	* post input
	*/
	function postInput($string)
	{
		return inset($_POST[$string]) ? $_POST[$string] : '';
	}
 ?>