<?php
require_once('./core/router.php');

class Application
{
    public $router;
    function __construct()
    {
        $this->router = new Router();
    }

    public function run()
    {
        session_start();
        $this->router->run();
    }
}
