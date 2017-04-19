<?php
/*
 * IX Portal - Router Wifidog Portal used for authenticating users
 * Developed by Howard Liu <howard@ixnet.work>, License under MIT
 */

namespace Lib;

class Template
{
    public static function load($template, $argv = array())
    {
        ob_start();
        require __DIR__.'/../Templates/'.$template.'.php';
        $view = ob_get_clean();
        foreach ($argv as $name => $value) {
            $view = str_ireplace("{{ $$name }}", $value, $view);
        }
        echo $view;
    }

    public static function isActive($action, $activeOnly = false) {
        if (strpos($_GET['action'], $action) === 0) {
            echo $activeOnly ? 'active' : 'class="active"';
        }
    }
}
