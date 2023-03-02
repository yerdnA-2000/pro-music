<?php

namespace src\services;

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
        $to  = "<fobos.2035@gmail.com>" ;

        $subject = "Новая заявка";

        $message = ' <p>Текст письма</p> </br> <b>1-ая строчка </b> </br><i>2-ая строчка </i> </br>';

        $headers  = "Content-type: text/html; charset=windows-1251 \r\n";
        $headers .= "From: От кого письмо <fobos.2035@gmail.com>\r\n";
        $headers .= "Reply-To: fobos.2035@gmail.com\r\n";

        mail($to, $subject, $message, $headers);
    }
}