<?php
    require_once("phpmailer/PHPMailer.php");
    require_once("phpmailer/SMTP.php");
    require_once("phpmailer/Exception.php");
    $codigo = rand(100000, 999999);
    //$email = $_POST['email'];
    $email = "gabii6431@gmail.com";

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    ini_set('max_execution_time', 0);
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                   // Set mailer to use SMT
        $mail->Host = 'smtp.hostinger.com.br';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->SMTPAutoTLS = false;
        $mail->Username = 'stockplanner@rodrigoamf.com';                 // SMTP username
        $mail->Password = 'oIhVG1r8cr4I';                           // SMTP password
        $mail->Port = 587;                                    // TCP port to connect to

        # Define o remetente (você)
        $mail->From = "stockplanner@rodrigoamf.com"; # Seu e-mail
        $mail->FromName = "Stock Planner"; // Seu nome

        # Define os destinatário(s)
        $mail->AddAddress($email, 'Usuário Stock Planner'); # Os campos podem ser substituidos por variáveis

        # Define os dados técnicos da Mensagem
        $mail->isHTML(true); # Define que o e-mail será enviado como HTML

        # Define a mensagem (Texto e Assunto)
        $mail->Subject = "Código de recuperação de senha"; # Assunto da mensagem
        $mail->Body = "Seu código de recuperação é: ". $codigo;

        # Envia o e-mail
        $enviado = $mail->Send();

        # Limpa os destinatários e os anexos
        $mail->ClearAllRecipients();
        $mail->ClearAttachments();

        # Exibe uma mensagem de resultado (opcional)
        if ($enviado) {
            echo "$codigo";
        } else {
            echo "-1";
        }
    } catch (Exception $e) {
        echo 'A mensagem não pode ser enviada.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
?>