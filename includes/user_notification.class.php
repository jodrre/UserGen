<?php
function EmailIt($user_id, $notification_type) {
	/* Notification types:
			1 = New user
			2 = Access change
			3 = Termination
	*/
	include('class.phpmailer.php');
	include('class.smtp.php');
	include('conf.php');
	$mail = new PHPMailer();
	$mail->IsSMTP();                                      // set mailer to use SMTP
	$mail->Host = $mail_host;  // specify main and backup server
	$mail->Port = $mail_port;
	$mail->SMTPAuth = $mail_auth;     // turn on SMTP authentication
	$mail->Username = $mail_username;  // SMTP username
	$mail->Password = $mail_password; // SMTP password
	
	$mail->From = $mail_from;
	$mail->FromName = $mail_fromName;
	$mail->AddAddress("jodrre@gmail.com", "Joe R");
	$mail->AddReplyTo("info@example.com", "Information");
	
	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
	//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
	$mail->IsHTML(true);                                  // set email format to HTML
	
	$mail->Subject = "Here is the subject";
	$mail->Body    = "This is the HTML message body <b>in bold!</b>";
	$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
	
	if(!$mail->Send())
	{
		echo "Something went wrong. Send IT the following error information:<br>";
		echo $mail->ErrorInfo;
		exit;
	}
	echo "Message has been sent";
}