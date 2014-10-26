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
        session_start();
        require_once CORE . 'Config.php';
        require_once CORE . 'Request.php';
        require_once CORE . 'Url.php';
        require_once CORE . 'View.php';
        require_once CORE . 'Router.php';
        require_once CORE . 'Database.php';
        require_once CORE . 'Collection.php';

        spl_autoload_register('App::ClassLoader');
        Config::load();
        Router::load();

    }

    /**
     * Checks if current PHP version is up to date enough
     * @return void
     */
    static public function checkVersion()
    {
        if (version_compare(phpversion(), '5.5', '<=')) {
            echo '<meta charset=UTF-8>';
            trigger_error('Votre version de PHP (' . phpversion() . ') est obsolète. Veuillez installer une version plus récente (PHP 5.5 minimum)' , E_USER_ERROR);
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
        require APP . 'models/' . $classModel . 'Model.php';
    }

    static public function getCSRF()
    {
        if (!isset($_SESSION['__CSRF']) || (($_SESSION['__GENERATED'] + 300) < microtime(true))) {
            $_SESSION['__CSRF'] = sha1(microtime(true)) . uniqid();
            $_SESSION['__GENERATED'] = microtime(true);
        }
        return $_SESSION['__CSRF'];
    }
}
