<?php
header('Content-Type: text/html; charset=utf-8');
require_once('class/class.phpmailer.php');

$nome = isset($_POST["nome"]) ? $_POST["nome"] : null;
$email = isset($_POST["email"]) ? $_POST["email"] : null;
$assunto = isset($_POST["assunto"]) ? $_POST["assunto"] : null;
$mensagem = isset($_POST["mensagem"]) ? $_POST["mensagem"] : null;

$urlServidor = "http://localhost/fabiohenrique";
$templateUrl = "/wp-content/themes/fabiotheme";
$localImage = "/assets/images/";
$urlImage = $urlServidor . $templateUrl . $localImage . "back-email.png";
$html = '<html>

<head>
    <title>Email - Sistema de eventos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
        td {
            text-align: justify;
            border: none;
        }

        img {
            object-fit: cover;
        }

        h3 {
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #fff;
            font-weight: bold;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            text-shadow: 0 1px 1px #050600;
            font-size: 26px;
            margin: 0px;
        }

        p {
            color: #fff;
            margin: 0px;
            position: absolute;
            left: 110px;
            width: 100%;
            top: 62%;
            transform: translateY(-50%);
            font-size: 18px;
        }
    </style>
</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <table id="Tabela_01" width="602" border="0" cellpadding="0" cellspacing="0" align="center">
        <tbody>

            <tr>
                <td colspan="3" bgcolor="#F0F1F1" style="border-left: 1px solid #ECECEC;border-right: 1px solid #ECECEC;border-bottom: 1px solid #ECECEC;border-top: 1px solid #ECECEC;position : relative">
                    <img src="'. $urlImage .'" width="600" height="120" border="0">
                    <h3>Meu Site</h3>
                </td>
            </tr>

            <tr style="">
                <td width="15" height="137" bgcolor="#FFF" style="border-left: 1px solid #ECECEC;">&nbsp;</td>
                <td width="574" valign="top" bgcolor="#FFF" style="">

                    <br>

                    <fieldset style="border: 1px solid #bababa; text-align: left;">
                        <legend style=" letter-spacing: -1px; margin: 0 0 2px 0; line-height: 33px;font-size: 14px;text-align: left;text-transform: uppercase;"><strong>Mensagem</strong></legend>
                        <span style="text-align: justify; display: block; margin: 0px 0 10px 0;">
                        <strong>Nome :</strong> ' . $nome .' </span>
                        <span style="text-align: justify; display: block; margin: 0px 0 10px 0;">
                        <strong>E-mail :</strong> ' . $email .' </span>
                        <span style="text-align: justify; display: block; margin: 0px 0 10px 0;">
                        <strong>Assunto :</strong> ' . $assunto .' </span>
                        <span style="text-align: justify; display: block; margin: 0px 0 10px 0;">
                            '. $mensagem .'
                        </span>
                    </fieldset>

                    <br>
                </td>

                <td width="13" bgcolor="#FFFFFF" style="border-right: 1px solid #ECECEC;">&nbsp;</td>
                <tr>
                    <tr>
                        <td colspan="3" style="position : relative;border-left: 1px solid #ECECEC;border-right: 1px solid #ECECEC;border-bottom: 1px solid #ECECEC">
                            <img style="margin-top : 20px" src="'. $urlImage .'" height="80" width="600" border="0">
                            <p>Por favor não responder, esse é um e-mail automático.</p>
                        </td>
                    </tr>
        </tbody>
    </table>

</body>

</html>';


if ($nome) {
    if (preg_match("/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\-]+\.[a-z]{2,4}$/", $email)) {
        if ($assunto) {
            if ($mensagem) {
                $mail = new \PHPMailer(true);
                try {
                    $mail->CharSet = "UTF-8";
                    
                    $mail->isSMTP();
                    $mail->Host = 'smtp.mailtrap.io';              
                    $mail->SMTPAuth = true;                  
                    $mail->Username = '34f4db277909c1';      
                    $mail->Password = '709a0cb3a6142e';                          
                    $mail->SMTPSecure = 'tls';                           
                    $mail->Port = 465;                                 
                    
                    $mail->addReplyTo($email, $nome);
                    $mail->setFrom("fabio.siqueira1222@gmail.com","Site Fábio Henrique");
                    $mail->addAddress("fabio.siqueira1222@gmail.com", "Site Fábio Henrique");     // Add a recipient
                    
                    $mail->isHTML(true);                                  // Set email format to HTML
                    
                    $mail->Subject = $assunto;
                    $mail->Body = $html;
                    $mail->AltBody = $mensagem;
                    
                    $mail->send();
                    json_encode(['message' => "Mensagem enviada com sucesso", 'type' => 1], 1);
                    

                } catch (phpmailerException $e) {
                    var_dump($e);
                    echo json_encode(['message' => "Mensagem Não pode ser enviada ," . $e->errorInfo(),
                    "type" => 0], 1);
                }

            } else {
                echo json_encode(["message" => "Digite sua mensagem",
                "type" => 0]);
            }
        } else {
            echo json_encode(["message" => "Digite o assunto",
            "type" => 0]);
        }
    } else {
        echo json_encode(["message" => "Digite um email válido",
        "type" => 0]);
    }
} else {
    echo json_encode(["message" => "Digite o seu nome",
    "type" => 0]);
}
