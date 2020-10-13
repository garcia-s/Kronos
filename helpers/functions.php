<?php
function dnd($var)
{
    echo ('<pre>');
    var_dump($var);
    echo ('</pre>');
    die();
}


function diecho($var)
{
    die('<pre>' . $var . '</pre>');
}
