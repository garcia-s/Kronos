<?php
// $url = isset($_SERVER["PATH_INFO"]) ? explode('/', ltrim($_SERVER["PATH_INFO"], '/')) : [];
require_once('./core/config.php');
require_once('./helpers/functions.php');
require_once('./core/core.php');

$app = new Application();

require_once('./app/app.php');

$app->run();
