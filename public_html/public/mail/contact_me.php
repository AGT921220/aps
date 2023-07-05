 <?php
//define('SECRET_KEY', '6LcD3YAaAAAAAFDadt_aIuqujdXT68V9mReo2sHT'); 

// var_dump($_POST);
if($_POST['token']){
  $googleToken = $_POST['token'];
  // echo $googleToken;
  
  $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcD3YAaAAAAAFDadt_aIuqujdXT68V9mReo2sHT&response={$googleToken}"); 
  $response = json_decode($response);

  $response = (array) $response;

        if($response['success'] && ($response['score'] && $response['score'] > 0.5))  {
          sendEmail();
        }
        else{
          var_dump($response);
          sendError();
        }

  }else{
    echo 'No se envio el token';
    sendError();  
  }


  function sendEmail(){
    $telefono = strip_tags(htmlspecialchars($_POST['telefono']));
    $email = strip_tags(htmlspecialchars($_POST['email']));
    $nombre = strip_tags(htmlspecialchars($_POST['nombre']));
    $descripcion = strip_tags(htmlspecialchars($_POST['descripcion']));


// Create the email and send the message
//admin@promocionalesaps.com.mx
$to = "ventas@promocionalesaps.com.mx"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Contacto: Contacto ".$nombre;
$body = 
" \n\n Telefono: ".$telefono.
" \n\n Correo: ".$email.
" \n\n Nombre: ".$nombre.
" \n\n Mensaje: ".$descripcion;
$header = "From: contacto@promocionalesaps.com.mx\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
//$header .= "Reply-To: email";	


if(mail($to, $subject, $body, $header)){
    $response['message']='Tu mensaje ha sido enviado, en breve nos comunicaremos contigo.';
    $response['success']='success';
    $response['title']='Enviado';
    echo json_encode($response);
  }else{
    sendError();  
  }

  }

  function sendError(){
    $response['message']='Hubo un error, por favor revisa tu conexión e intentalo de nuevo.';
    $response['success']='error';
    $response['title']='No se envió';
    echo json_encode($response);
  }