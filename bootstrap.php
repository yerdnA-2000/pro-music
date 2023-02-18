<?php

use core\Route;

require_once 'core/interfaces/ModelInterface.php';
require_once 'core/interfaces/ViewInterface.php';
require_once 'core/interfaces/RouteInterface.php';
require_once 'core/interfaces/ConfigInterface.php';
require_once 'core/Config.php';
require_once 'core/Model.php';
require_once 'core/View.php';
require_once 'core/Controller.php';
require_once 'core/Route.php';
require_once 'src/controllers/HomeController.php';

(new Route())->run();