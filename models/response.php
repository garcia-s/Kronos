<?php

class Response
{
    public function code($code)
    {
        http_response_code($code);
    }

    public function json($message)
    {
        header('Content-type: application/json');
        return json_encode($message);
    }

    public function send($message)
    {
        echo ($message);
    }

    public function redirect($location)
    {
        header('location: ' . $location);
    }
}
