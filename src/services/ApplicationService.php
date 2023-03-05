<?php

namespace src\services;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use src\models\Application;

class ApplicationService
{

    public static function createApplication(): bool
    {
        $data = [
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'email' => $_POST['email'],
            'message' => $_POST['message'],
        ];

        return (new Application())->create($data);
    }

    public static function sendApplicationEmail()
    {
        $name = 'name';
        $email = 'fobos.2035@gmail.com';
        $text = 'message';

        $title = "Заголовок письма";
        $body = "<h2>Новая заявка</h2>
            <b>Имя:</b> $name<br>
            <b>Почта:</b> $email<br><br>
            <b>Сообщение:</b><br>$text";

        $mail = new PHPMailer();
        try {
            $mail->Mailer = 'smtp';
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = 3;
            $mail->isSMTP();
            $mail->Debugoutput = function ($str, $level) {
                $GLOBALS['status'][] = $str;
            };

            // Настройки вашей почты
            $mail->Host = 'smtp.a0785716.xsph.ru'; // SMTP сервера вашей почты
            $mail->Username = 'falkova.anastasija@a0785716.xsph.ru'; // Логин на почте
            $mail->Password = 'falkova0101'; // Пароль на почте fzroqkqrdbkwmxzb
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPAuth = true;
            $mail->Port = 25;
            $mail->setFrom('falkova.anastasija@a0785716.xsph.ru', 'Имя отправителя');

            // Получатель письма
            $mail->addAddress('fobos.2035@gmail.com', 'Andrey');

            // Отправка сообщения
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body = $body;

            // Проверяем отравленность сообщения
            dump($mail->send());

        } catch (Exception $e) {
            $result = "error";
            $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
        }

        dump($mail->ErrorInfo);

    }
}