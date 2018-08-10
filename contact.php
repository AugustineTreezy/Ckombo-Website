<?php
if (!empty($_POST)) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	if (!preg_match(
		"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
		$email)){
		    $data['message'] = "Error: Invalid email address";
			$data['type'] = "error";
		}else {
				$to = 'augustinetreezy@gmail.com';     

			    // Your subject
			    $subject="Client Message - CkomboHydroWorks";

			    // From
			    $header="from: CkomboHydroWorks <support@ckombohydroworks.com>";

			    //message
			    $user_message="$message\r\n\r\n$name\r\n$email";

			    // send email
			    $sendmail = mail($to,$subject,$user_message,$header);

			    if ($sendmail) {			        
					$data['message'] = "Your message was successfully sent, we will get back to you as soon as possible";
					$data['type'] = "success";
			    }else{		        
					$data['message'] = "Error: Something went wrong, try again later";
					$data['type'] = "error";
			    }

				

		}

	header('Content-Type:Application/json');
	echo json_encode($data);

}

 ?>