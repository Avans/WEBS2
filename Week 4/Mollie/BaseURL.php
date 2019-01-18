<?php


class BaseURL
{

    static function generateFromServerGlobal() {
        $url = 'http';
        if (array_key_exists('HTTPS', $_SERVER)) {
            $url .= 's';
        }
        $url .= '://';
        if (array_key_exists('HTTP_HOST', $_SERVER)) {
            $url .= $_SERVER['HTTP_HOST'];
        } else {
            $url .= $_SERVER['SERVER_NAME'];
        }
        if ($_SERVER['SERVER_PORT'] !== '80') {
            $url .= ':' . $_SERVER['SERVER_PORT'];
        }
        return $url . dirname($_SERVER['REQUEST_URI']);
    }

}