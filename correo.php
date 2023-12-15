<?php
function correo($nombre, $email, $mensaje){
	//error_reporting(E_ALL);
	//error_reporting(E_STRICT);
	
	//date_default_timezone_set('America/Toronto');
	
	require_once('class.phpmailer.php');
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
	
	$mail             = new PHPMailer();
	
	$body             = $mensaje;
	
	$mail->IsSMTP(); // telling the class to use SMTP
	//$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
	//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
											   // 1 = errors and messages
											   // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "mediaipack@gmail.edu.co";  // GMAIL username
	$mail->Password   = "correo";            // GMAIL password
	
	$mail->SetFrom('correo@gmail.edu.co', 'correo');
	
	//$mail->AddReplyTo("correo@gmail.com","GGG GmaiL");
	
	$mail->Subject    = $asunto;
	
	//$mail->AltBody    = ; // optional, comment out and test
	
	$mail->MsgHTML($body);
	
	$address = explode(",",$email);
	foreach($address as $raddress){
	$mail->AddAddress($raddress, "");
	}
	
	//$mail->AddAttachment("images/phpmailer.gif");      // attachment
	//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

	if(!$mail->Send()) {
	  echo "Error de envio: " . $mail->ErrorInfo;
	} else {
	  return "1";
	}
}
?>

