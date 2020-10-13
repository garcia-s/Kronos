<?php

class Request
{
    public $session;
    public $params;

    public function __construct($session, $params)
    {
        $this->session = $session;
        $this->params = $params;
    }
}
