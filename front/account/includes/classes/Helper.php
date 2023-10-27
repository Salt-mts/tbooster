<?php 

class Helper{

	public static function siteName(){
		return "Team Booster";
	}
	public static function site_url(){
		// return "https://tbooster.com/";
		return "http://localhost/projects/cat-clients/tbooster/";
	}
	public static function admin_url(){
		// return "https://tbooster.com/0app/";
		return "http://localhost/projects/cat-clients/tbooster/admin/";
	}	
	public static function siteEmail(){
		return "support@tbooster.com";
		// return "mo6014245571@gmail.com";
	}
	public static function sitePhone(){
		return "0801-234-5678";
	}
	public static function imagePath(){
		return Helper::admin_url()."assets/img/products/";
	}
	public static function redirect($location){
		header("location: $location");
	}
	public static function currency(){
		return "&#8358; ";
	}
	public static function date(){
		return date("F d Y, g:i a");
	}
	public static function logo(){
		return Helper::site_url()."assets/img/logo.png";
	}

	public static function alert(){
	 	if (isset($_SESSION['error'])) {
	 		echo '<div class="main-alert error">        
			        <button class="close-main-alert"><i class="fa-regular fa-circle-xmark"></i></button>
			        <p class="main-alert-msg">'.$_SESSION['error'].'</p>
			    </div>';
			unset($_SESSION['error']);
	 	}elseif (isset($_SESSION['success'])) {
	 		echo '<div class="main-alert success">        
			        <button class="close-main-alert"><i class="fa-regular fa-circle-xmark"></i></button>
			        <p class="main-alert-msg">'.$_SESSION['success'].'</p>
			    </div>';
			unset($_SESSION['success']);
	 	}
	 }

	public static function randomString($length){
		$string = "QWERTYUIOPLKJHGFDSAZXCVBNMqwertyuioplkjhgfdsazxcvbnm1234567890";
		return $order_unique_id = substr(str_shuffle($string), 0, $length);
	}

}






 ?>