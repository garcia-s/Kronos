<?php

$app->router->get('/', function ($req, $res) {
    $res->code(400);
    $res->send($res->json("THIS IS HOME"));
});

$app->router->get('/user/{name}/scoreboard/{id}', function ($req, $res) {
    $res->code(200);
    $res->send($res->json("THIS IS THE SCOREBOARD " . $req->params['id'] . ' FOR THE USER ' . $req->params['name']));
});
