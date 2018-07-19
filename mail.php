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
	    http_response_code(200);
        echo "Thank You! Your message has been sent.";
	} catch (Exception $e) {
    	http_response_code(500);
        echo "Oops! Something went wrong and we couldn't send your message.";
	}

?>
