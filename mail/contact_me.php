<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No has ingresado los datos!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'pfc.vik@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contacto desde Vikgarcia.com:  $name";
$email_body = "Ha recibido un nuevo mensaje de su formulario de contacto web.\n\n"."Aquí están los detalles:\n\nNombre: $name\n\nEmail: $email_address\n\nTélefono: $phone\n\nMensaje:\n$message";
$headers = "From: noreply@vikgarcia.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
