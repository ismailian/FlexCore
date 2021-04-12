<?php

namespace Flex\Utilities;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Mailer
{

    private $mailer = null;


    /**
    * Load in phpmailer settings
    */
    private static function load()
    {
        Mailer::$mailer = new PHPMailer();

        Mailer::$mailer->SMTPDebug  = SMTP::DEBUG_OFF;                        # Enable verbose debug output
        Mailer::$mailer->isSMTP();                                            # Send using SMTP
        Mailer::$mailer->Host       = 'smtp.gmail.com';                       # Set the SMTP server to send through
        Mailer::$mailer->SMTPAuth   = true;                                   # Enable SMTP authentication
        Mailer::$mailer->Username   = 'username';                             # SMTP username
        Mailer::$mailer->Password   = 'password';                             # SMTP password
        Mailer::$mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            # Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        Mailer::$mailer->Port       = 587;
    }

    /**
    * Send an email
    *
    * @param string $from the from property.
    * @param string $to the to address.
    * @param string $subject the email subject.
    * @param string $message the email content.
    *
    *
    */
    public static function send($from = "root@localhost", $to, $subject, $message)
    {
        Mailer::load();

        try {

            Mailer::$mailer->setFrom($from, "FlexCore Team");
            Mailer::$mailer->addAddress($to);
            Mailer::$mailer->addReplyTo($from);

            Mailer::$mailer->isHTML(false);
            Mailer::$mailer->Subject = $subject;
            Mailer::$mailer->Body    = ($message);

            if (!Mailer::$mailer->send()) {
                return false;
            }
            return true;

        } catch (Exception $e) {
            return Mailer::$mailer->ErrorInfo;
        }
    }
}
