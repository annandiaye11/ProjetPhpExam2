<?php
namespace Anna\Core;
class Session 
{
    public static function open() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function close() {
        session_destroy();
    }

    public static function add(string $key, mixed $value) {
        $_SESSION[$key] = $value;
        //dd($_SESSION[$key]);
        echo"-----------------";
    }

    public static function remove(string $key):bool {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }
}
