<?php 

$nombre = $_POST["nombre"];
$correo = $_POST["correo"];
$celular = $_POST["celular"];
$mensaje = $_POST["mensaje"];

$body = "Nombre: " . $nombre . "<br>Correo: " . $correo . "<br>Celular: " . $celular . "<br>Mensaje: " . $mensaje;

use  PHPMailer \ PHPMailer \ PHPMailer ;
use  PHPMailer \ PHPMailer \ Exception ;

require  'PHPMailer/Exception.php' ;
require  'PHPMailer/PHPMailer.php' ;
require  'PHPMailer/SMTP.php' ;   

// Crea una instancia; pasar `true` habilita excepciones 
$mail = new  PHPMailer ( true );

try {
     // Configuración del servidor 
    $mail -> SMTPDebug = 0;           
    $mail -> isSMTP();                
    $mail -> Host = 'smtp.gmail.com';
    $mail -> SMTPAuth  = true ;      
    $mail -> username= 'elementsalfareriayorquideas@gmail.com';              
    $mail -> Contraseña = 'KENMEGAMAN13069';        
    $mail -> SMTPSecure = 'tls';            // Habilita el cifrado TLS implícito 
    $mail -> Port  = 587;             // Puerto TCP al que conectarse; use 587 si ha configurado `SMTPSecure = PHPMailer :: ENCRYPTION_STARTTLS`

    // Destinatarios 
    $mail -> setFrom ( 'elementsalfareriayorquideas@gmail.com' , $nombre );
    $mail -> addAddress ('elementsalfareriayorquideas@gmail.com');     


    // Contenido 
    $mail -> isHTML (true);         // Establecer el formato de correo electrónico en HTML 
    $mail -> Asunto = 'Mensaje enviado desde la pagina web Elements' ;
    $mail -> Body   = $body ;
    

    $mail -> send();
    echo  '<scrip>  
    alert ("El mensaje se envio correctamente");
    window.history.go(-1);
    </scrip>';
}   catch ( Exception  $e ) {
    echo  "No se pudo enviar el mensaje. Error de correo: ", $mail->ErrorInfo;
}