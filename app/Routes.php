<?php
// Router::register('GET', ['url' => '/foo/{needed}/{?optional}', 'controller' => 'foo', 'action' => 'bar']);

Router::register('GET', ['url'        => '/Accueil',
                         'controller' => 'MainController',
                         'action'     => 'home'
                ]);

Router::register('GET', ['url'        => '/',
                         'controller' => 'MainController',
                         'action'     => 'home'
                ]);

Router::register('GET', ['url'        => '/Hello/{?name}',
                         'controller' => 'TestController',
                         'action'     => 'hello'
                ]);

Router::fallback(['controller' => 'MainController',
                  'action'     => 'fallback'
                ]);