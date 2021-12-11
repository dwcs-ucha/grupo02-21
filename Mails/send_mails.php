<?php
/*
Versión: 1.0.0 
Última fecha de modificación : 06/12/2021
Autor: Manuel Rios
*/
		
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require './Phpmailer/Exception.php';
require './Phpmailer/PHPMailer.php';
require './Phpmailer/SMTP.php';

function mail_cpanel($nombre,$email,$direccion,$link){
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //variables para meter en el body
        $body="Nombre: " . $nombre . "<br>Email: " . $email . "<br>Direccion: " . $direccion . "<br>Click en el link para verificar su cuenta: " . $link ;
        
        //Server settings
        $mail->SMTPDebug = 0 /* Si substituimos por SMTP::DEBUG_SERVER nos imprimira por pantalla todo el proceso*/;                 //Enable verbose debug output
        $mail->isSMTP();                                            								     //Send using SMTP
        $mail->Host       = 'mail.grupo022122dwcs.uchaweb2.es';                      				   		     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                  								     //Enable SMTP authentication
        $mail->Username   = '_mainaccount@grupo022122dwcs.uchaweb2.es';          			        		     //SMTP username
        $mail->Password   = 'MUchaUcha..';                           			  					     //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; /* Cambiar aqui por ssl si no funciona */           			     //Enable implicit TLS encryption
        $mail->Port       = 465;                                    								     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients - Primera linea desde que correo se mandara el email, y en las siguientes a quien se enviara
        $mail->setFrom('prueba.grupo022122dwcs@gmail.com', 'grupo022122dwcs');
        $mail->addAddress($email);     //Add a recipient
        //Aqui se podria incluir una linea igual que la de arriba para enviarselo a otro usuario extra

        //Attachments - En las dos siguientes lineas se podrian mandar archivos
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Verificación de cuenta';
        $mail->Body    = $body;
        $mail->CharSet = 'UTF-8';    

        $mail->send();
        echo 'El mensaje ha sido enviado correctamente';
    } catch (Exception $e) {
        echo "El mensaje no ha podido ser enviado. Error: {$mail->ErrorInfo}";
    }
}
?>
