<?php

    defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
    defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'AAAAAA' . DS . 'Programs' . DS . 'OSPanel' . DS . 'domains' . DS . 'restAPItemplate');
    defined('INC_PATH') ? null : define('INC_PATH', SITE_ROOT.DS.'includes');
    defined('CORE_PATH') ? null : define ('CORE_PATH', SITE_ROOT.DS.'core');
    defined('ROUTES_PATH') ? null : define ('ROUTES_PATH', SITE_ROOT.DS.'api');

    require_once (INC_PATH.DS."config.php");
    require_once (CORE_PATH.DS."post.php");
    require_once (ROUTES_PATH.DS."routes.php");
    
?>