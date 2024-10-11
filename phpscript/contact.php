<?php
// EDIT A LINE BELOW AS REQUIRED

$email_to = "servicios@chamitorres.com.mx";

// CUSTOME YOUR EMAIL SUBJECT

$email_subject = "REQUERIMIENTO DE ASESORIA GRATUITA";

// COMPONENT FUNCTION
/**
 * @param $data
 * @return string
 */
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

/**
 * @param $string
 * @return mixed
 */
function clean_string($string) {
	$bad = array("content-type", "bcc:", "to:", "cc:", "href");
	return str_replace($bad, "", $string);
}

// GET DATA FROM AJAX

$contact_name    = test_input($_POST['nombre']);
$contact_email   = test_input($_POST['email']);
$contact_message = test_input($_POST['Mensaje']);

$email_message = "De: ".clean_string($contact_name)."\n";

$email_message .= "Email: ".clean_string($contact_email)."\n";

$email_message .= "Mensaje: ".clean_string($contact_message)."\n";

$headers = 'From: '.$contact_email."\r\n".

'Reply-To: '.$contact_email."\r\n".

'X-Mailer: PHP/'.phpversion();

@mail($email_to, $email_subject, $email_message, $headers);
