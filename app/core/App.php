<?php

/**
* main app class
*/
class App
{
    /**
     * Fires the application
     * @return void
     */
    static function run()
    {
        self::checkVersion();
        self::loadCore();
        self::setErrorMode();

        Router::dispatch();
    }

    /**
     * includes the core files
     * @return void
     */
    static private function loadCore()
    {
        require_once CORE . 'Config.php';
        require_once CORE . 'Request.php';
        require_once CORE . 'Url.php';
        require_once CORE . 'View.php';
        require_once CORE . 'Router.php';
        require_once CORE . 'Model.php';

        Config::load();
        Router::load();
        spl_autoload_register('App::ClassLoader');
    }

    /**
     * Checks if current PHP version is up to date enough
     * @return void
     */
    static public function checkVersion()
    {
        if (version_compare(phpversion(), '5.4', '<')) {
            die('<meta charset=UTF-8>Votre version de PHP est obsolète, veuillez installer une version plus récente');
        }
    }

    /**
     * Sets the display errors parameter at true or false based on the debug state in the config
     * @return void
     */
    static private function setErrorMode()
    {
        if (Config::get('app.Debug')) {
            ini_set('display_errors',1);
            ini_set('display_startup_errors',1);
            error_reporting(E_ALL | E_STRICT);
        } else {
            ini_set('display_errors',0);
            ini_set('display_startup_errors',0);
        }
    }

    static private function ClassLoader($classModel)
    {
        require APP . 'model/' . $classModel . 'Model.php';
    }
}
