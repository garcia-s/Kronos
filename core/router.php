<?php
require_once('./models/response.php');
require_once('./models/request.php');

class Router
{
    private $url;
    private $routes = [];
    private $method;
    private $req;

    function __construct()
    {
        $this->url = isset($_SERVER["PATH_INFO"]) ? explode('/', trim($_SERVER["PATH_INFO"], '/')) : [];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function get($route, $callback)
    {
        array_push($this->routes, [
            'method' => 'GET',
            'url' => $route !== '/' ? explode('/', trim($route, '/')) : [],
            'action' => $callback
        ]);
    }

    public function post($route, $callback)
    {
        array_push($this->routes, [
            'method' => 'POST',
            'url' => $route !== '/' ? explode('/', trim($route, '/')) : [],
            'action' => $callback
        ]);
    }


    public function run()
    {
        foreach ($this->routes as $route) {
            if ($route['method'] !== $this->method) continue;
            if (count($route['url']) !== count($this->url)) continue;

            $keys = array_diff_assoc($route['url'], $this->url);
            $values = array_diff_assoc($this->url, $route['url']);

            if (count(array_filter($keys, function ($e) {
                return preg_match('{\w+}', $e) == 0;
            }))) {
                continue;
            };

            $keys = array_map(function ($key) {
                return trim($key, '{}');
            }, $keys);

            $res = new Response();
            $req = new Request($_SESSION, array_combine($keys, $values));
            return $route['action']($req, $res);
        }
        http_response_code(404);
        die();
    }
}
