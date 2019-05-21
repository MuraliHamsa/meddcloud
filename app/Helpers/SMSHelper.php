<?php
namespace App\Helpers;

class SMSHelper 
{


  	/********************************************************************************************
   	 *  Function to send Message
  	*********************************************************************************************/
  	public static function sendsms($mobile, $msg) 
  	{ 
	  	$request =""; //initialise the request variable
	  	$param['username'] = "meddcloud";
	  	$param['password'] = "123456789";
	  	$param['sender'] = "MCLOUD";
	  	$param['to'] = $mobile;
	  	$param['message'] = $msg; 
	  	//Have to URL encode the values
	  	foreach($param as $key=>$val) {
		   	$request.= $key."=".urlencode($val);
		   	//we have to urlencode the values
		   	$request.= "&";
		   	//append the ampersand (&) sign after each
	  	}	
	  	$request = substr($request, 0, strlen($request)-1);
	  	//remove final (&) sign from the request
	  	$url = "http://hpsms.jkgeniustech.in/API/WebSMS/Http/v1.0a/index.php?".$request; 
	  	$ch = curl_init($url);
	  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	  	$curl_scraped_page = curl_exec($ch);
	  	curl_close($ch);
	}

}

?>
