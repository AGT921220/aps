<?php
// Check for empty fields

// echo json_encode($_POST);

// return false;

if(empty($_POST['producto']) || empty($_POST['cantidad']) || empty($_POST['telefono']) || empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}




$producto = strip_tags(htmlspecialchars($_POST['producto']));
$cantidad = strip_tags(htmlspecialchars($_POST['cantidad']));
$telefono = strip_tags(htmlspecialchars($_POST['telefono']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$nombre = strip_tags(htmlspecialchars($_POST['nombre']));
$descripcion = strip_tags(htmlspecialchars($_POST['descripcion']));


// Create the email and send the message
//admin@promocionalesaps.com.mx
$to = "alfredo.gutierrez.92@hotmail.com"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Contacto: Cotización".$nombre;
$body = "Producto: ".$producto.
" \n\n Cantidad: ".$cantidad.
" \n\n Telefono: ".$telefono.
" \n\n Correo: ".$email.
" \n\n Nombre: ".$nombre.
" \n\n Descripción: ".$descripcion;
$header = "From: cotizacion@promocionalesaps.com.mx\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$header .= "Reply-To: email";	


if(mail($to, $subject, $body, $header)){
    $response['message']='Tu solicitud ha sido enviada, en breve nos comunicaremos contigo.';
    $response['success']='success';
    $response['title']='Enviado';
    echo json_encode($response);
  }else{
    $response['message']='Hubo un error, por favor revisa tu conexión e intentalo de nuevo.';
    $response['success']='error';
    $response['title']='No se envió';
    echo json_encode($response);
  
  }

?>
