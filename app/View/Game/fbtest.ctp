<?php 

  $app_id = "175831985792236";
  $app_secret = "0f22197c79abab2f67f3cbfdf44dcc4b"; 
  $my_url = "https://apps.facebook.com/phpinfodarshan/";
//sandeep nandi: accesstoken: AAACf6xMNpOwBAPq8mWBC8hQISJEN50jFJR5ZB8Ejbs7bH3SVhrPK0TECJsb3TiipTZBga7cCfEsVhRbu0wjKItDzmk77WGCyhOZBCHkfwZDZD appid:175831985792236
 // $code =  "AAACf6xMNpOwBAPq8mWBC8hQISJEN50jFJR5ZB8Ejbs7bH3SVhrPK0TECJsb3TiipTZBga7cCfEsVhRbu0wjKItDzmk77WGCyhOZBCHkfwZDZD";
  //"AQBAOsQlk22lTcYi96JxhnhOLeV-cmNg40o1Qkf3SBhuAsadCKzqblw5PoHyVT80uXl5lnboLh3IZhFs6eMu-uA7kH69p6LxCATRdeLJuPEzZ8pUwD8rYQcG5gRJ37zDE5MD1kVodiJ9N99wtPFCZp39NRE_zjZqMc7wk3SQ-kYmwzLfrhnj-QqB2RTfdarCbR8#_=_";

	$userid="100003564004701";
   $access_token = "AAACf6xMNpOwBAPq8mWBC8hQISJEN50jFJR5ZB8Ejbs7bH3SVhrPK0TECJsb3TiipTZBga7cCfEsVhRbu0wjKItDzmk77WGCyhOZBCHkfwZDZD";
  if(!empty($access_token)) {
    /*$token_url = "https://graph.facebook.com/oauth/access_token?client_id="
				. $app_id . "&redirect_uri=" . urlencode($my_url) 
				. "&client_secret=" . $app_secret 
				. "&code=" . $code;
	*/
	//CakeLog::write('debug','token_url: ' . $token_url);

	
	  

	  
	  //CakeLog::write('debug','access_token: ' . $access_token);
	 // $batched_request = '[{"method":"GET","relative_url":"100003564004701"}]';

	  $post_url = "https://graph.facebook.com/" . $userid ."?access_token=" . $access_token;
	 // echo $post_url;
	CakeLog::write('debug','post_url: ' . $post_url);
	  $post = file_get_contents($post_url);
	  //echo '<p>Response: <pre>' . $post . '</pre></p>';
	  CakeLog::write('debug','post: ' . $post);
	  $user= json_decode($post);
	  
	  CakeLog::write('debug','user : ' . $user->name);
  }

  

?>