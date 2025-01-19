<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sending Email...</title>

    <link rel="stylesheet" href="styles/main.css">
</head>
<body>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Instantiation and passing [ICODE]true[/ICODE] enables exceptions
$mail = new PHPMailer(true);

try {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phone-number'];
    $message = $_POST['message'];
    
    //Server settings
    // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'etemp2006@gmail.com';                 // SMTP username
    $mail->Password = "cnolihnurwwuyuks";                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                      // TCP port to connect to

    //Recipients
    $mail->setFrom('etemp2006@gmail.com', 'klevistarazhi.com');     // Add a recipient
    $mail->addAddress('ktarazhi23@beder.edu.al', 'Mailer');     // Add a recipient

    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Mesazh i ri nga $name";
    $mail->Body    = "
    <div style='width: 100%;max-width: 500px;padding: 30px;background-color: #f0f0f0;fon-family: system-ui;'>
        <h1>Mesazh i ri nga $name</h1>
        <p>$message</p>
        <hr>
        <ul>
            <li>Email: <a href='mailto:$email'>$email<a></li>
        </ul>
    </div>
    ";

    $mail->send();
    echo 'Emaili u dergua me sukses.';

} catch (Exception $e) {
    echo 'Email failed to send. Please try again later. <br>';
    echo $e;
}

?>

</body>
</html>