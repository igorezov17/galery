<?php
namespace app\components;

class Notifications
{
    private $mailer;

    public function __construct(Mail $mailer)
    {
        $this->mailer = $mailer;
    }

    public function emailWasChanged($email, $selector, $token)
    {
        //Используем $email для отправки вместо gtestovik39@gmail.com
        $message = 'https://php02/verify_email?selector=' . \urlencode($selector) . '&token=' . \urlencode($token);
        $this->mailer->send('gtestovik39@gmail.com', $message); // используем вместо gtestovik39@gmail.com
    }

    public function passwordReset($email, $selector, $token)
    {
        //Используем $email для отправки вместо gtestovik39@gmail.com
        $message = 'https://php02/password-recovery/form?selector=' . \urlencode($selector) . '&token=' . \urlencode($token);
        $this->mailer->send('gtestovik39@gmail.com', $message); // используем вместо gtestovik39@gmail.com
    }


}