<?php

namespace app\auth;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * mail controller
 */
class MailerController {
	/**
	 * send a message
	 * 
	 * @param string $mailTo - recipient
	 * @param string $mailSubject - subject
	 * @param string $mailText - text-only content of the message
	 * @param string $mailHtml - html content of the message
	 * @return void
	 */
	public static function sendMail($mailTo, $mailSubject, $mailText, $mailHtml) {
		$mail = new PHPMailer(true);						// Passing `true` enables exceptions

		try {
			//Server settings
			$mail->SMTPDebug = 0;							// Enable verbose debug output
				// 0 = off (for production use)
				// 1 = client messages logs
				// 2 = client and server messages logs
			$mail->isSMTP();								// Set mailer to use SMTP
			$mail->Host = MAILER_HOST;						// Specify main and backup SMTP servers
				// use
				// $mail->Host = gethostbyname('smtp.gmail.com');
				// if your network does not support SMTP over IPv6
			$mail->SMTPAuth = true;							// Enable SMTP authentication
			$mail->Username = MAILER_NAME;					// SMTP username
				// full email address
			$mail->Password = MAILER_PASSWORD;				// SMTP password
				// email password
			$mail->SMTPSecure = 'tls';						// Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;								// TCP port to connect to
				// 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission

			//Recipients
			$mail->setFrom('webmaster@master.com', 'Main - PHP Framework Native');
			// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
			$mail->addAddress($mailTo);							// Name is optional
			// $mail->addReplyTo('info@example.com', 'Information');
			// $mail->addCC('cc@example.com');
			// $mail->addBCC('bcc@example.com');

			//Attachments
			// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			//Content
			$mail->isHTML(true);							// Set email format to HTML
			$mail->Subject = $mailSubject;
			$mail->Body    = $mailHtml;							// 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = $mailText;							// 'This is the body in plain text for non-HTML mail clients';
			$mail->CharSet = 'UTF-8';

			$mail->send();
			// echo 'Message has been sent.';
		} catch (Exception $e) {
			// echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
}