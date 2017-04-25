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
        if (file_exists(__DIR__.'/../Templates/'.$template.'.php')) {
            include __DIR__.'/../Templates/'.$template.'.php';
        } else {
            throwException('ERR_TEMPLATE_NOT_FOUND');
        }
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
