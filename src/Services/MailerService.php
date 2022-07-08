<?php

namespace App\Services;

use Symfony\Component\Mailer\MailerInterface;
Use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;

$transport = Transport::fromDsn('smtp://localhost');
$mailer = new Mailer($transport);

class MailerService
{
    public function __construct (private MailerInterface $mailer) {

    }

    public function sendEmail(
        $to = 'jl.hartman@it-students.fr',
        $subject = 'This is the Mail subject !',
        $content = '',
        $text = ''
    ): void{
        $email = (new Email())
            ->from('noreply@mysite.com')
            ->to($to)
            ->subject($subject)
            ->text($text)
            ->html($content);
        $this->mailer->send($email);
    }
}
