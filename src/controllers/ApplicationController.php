<?php

namespace src\controllers;

use core\Controller;
use JetBrains\PhpStorm\NoReturn;
use src\services\ApplicationService;

class ApplicationController extends Controller
{

    #[NoReturn]
    public function create()
    {
        header('Content-Type: application/json');
        if ($this->isAjax()) {
            if (!empty($_POST)) {
                if (ApplicationService::createApplication()) {
                    $this->view->message('success',
                        'Заявка успешно оставлена.',
                        'Вы успешно отправили заявку. Ожидайте, в ближайшее время с вами свяжутся по указанным контактам.');
                }
            }
        }
        $this->view->message('error', 'Произошла ошибка.', 'Ошибка запроса.');
    }

}