<?php

/**
* testing class
*/
class Test
{
    
    function hello($name = 'world')
    {
        echo '<h1>Hello ' . $name . '!</h1>';
        echo '<em>You can change/add name in the URL (/Hello/{name})</em><br>';
    }
}