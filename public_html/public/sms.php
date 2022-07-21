<?php


$name='Alfredo Gtz';
$envio='admin@agsoftweb.com.mx';
$phone=6144950659;
$email='admin@agsoftweb.com.mx';

        // Create the email and send the message
$to = "admin@agsoftweb.com.mx"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Contacto:  $name";
$body = "Mensaje de contacto.\n\n"."Aqui los detalles:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone

\n\Se envio correo a cliente:\n$envio
";
$header = "From: noreply@agsoftweb.com.mx\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";

mail($to, $subject, $body, $header);

if(!mail($to, $subject, $body, $header)){
    echo 'si';
}else{
    echo 'no';
}
