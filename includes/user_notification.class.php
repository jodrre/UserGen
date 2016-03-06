<?php
function EmailIt($user_id, $notification_type) {
	/* 
		Notification types:
			1 = New user
			2 = Access change
			3 = Termination
	*/
	include('class.phpmailer.php');
	include('class.smtp.php');
	include('conf.php');
	global $mysqli;
	$mail = new PHPMailer();
	$mail->IsSMTP();                                      // set mailer to use SMTP
	$mail->Host = $mail_host;  // specify main and backup server
	$mail->Port = $mail_port;
	$mail->SMTPAuth = $mail_auth;     // turn on SMTP authentication
	$mail->Username = $mail_username;  // SMTP username
	$mail->Password = $mail_password; // SMTP password
	$mail->From = $mail_from;
	$mail->FromName = $mail_fromName;
	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	//$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
	//$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
	$mail->IsHTML(true);                                  // set email format to HTML
	
	$getUserInfoSQL = "SELECT * FROM users WHERE user_id = ".$user_id.";";
	$getUserInfo = $mysqli->query($getUserInfoSQL);
	$getUserInfo = mysqli_fetch_assoc($getUserInfo);
	$getDept_MgrSQL = "SELECT * FROM departments WHERE department_id = ".$getUserInfo['user_dept'].";";
	$getDept_Mgr = $mysqli->query($getDept_MgrSQL);
	$getDept_Mgr = mysqli_fetch_assoc($getDept_Mgr);
	$mail->addAddress($mail_ITDepartment_email);	
	$mail->addCC($getDept_Mgr['dept_mgr_email']);

	
	switch ($notification_type) {
		case 1:
			$mail->Subject = "New user setup request: ".$getUserInfo['user_FName']." ".$getUserInfo['user_LName'];
			$mail->Body = "A new user request has been submitted.<br />";
			$mail->Body .= "The user will be created with the below information as it is entered.<br />";
			$mail->Body .= "Please allow two business days for completion.<p />";
			$mail->Body .= "<b>Name:</b> ".$getUserInfo['user_FName']." ".$getUserInfo['user_LName']."<br />";
			$mail->Body .= "<b>Job Title:</b> ".$getUserInfo['user_text_title']."<br />";
			$mail->Body .= "<b>Extension:</b> ".$getUserInfo['user_extension']."<br />";
			$mail->Body .= "<b>Badge number:</b> ".$getUserInfo['user_badge']."<br />";
			$mail->Body .= "<b>Start date:</b> ".$getUserInfo['user_startdate']."<p />";
			$mail->Body .= "If there is an error, please Reply-All to this email immediately to correct.";
			break;
		case 2:
			$mail->Subject = "User access change: ".$getUserInfo['user_FName']." ".$getUserInfo['user_LName'];
			break;
		case 3:
			break;		
	}
	
	if(!$mail->Send())
	{
		echo "Something went wrong. Send IT the following error information:<br>";
		echo $mail->ErrorInfo;
		exit;
	}
	echo "Message has been sent";
}