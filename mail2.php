<?php
	use google\appengine\api\mail\Message;
	use google\appengine\api\app_identity\AppIdentityService;
	
	try {
		$appid = AppIdentityService::getApplicationId();
		
		$firstname = $_POST["name"];
    	$email= $_POST["email"];
    	$text= $_POST["message"];
   	 	$subject = $_POST["subject"];
		
	    $message = new Message();
	    $message->setSender('noreply@' . $appid . '.appspotmail.com');
	    $message->addTo('michael.mulhausen@gmail.com');
	    $message->setSubject($subject);
	    $message->setTextBody($text);
	    $message->send();
	    echo 'Mail Sent';
	} catch (Exception $e) {
    	echo 'Caught exception: ',  $e->getMessage(), "\n";
	}

?>
