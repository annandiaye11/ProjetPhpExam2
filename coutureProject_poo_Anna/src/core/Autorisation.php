<?php
namespace Anna\Core;
class Autorisation {
    public static function isConnect():bool {
        return isset($_SESSION['user']);
    }

    public static function hasRole(string $role):bool {
        $user = $_SESSION['user'];
        if ($user) {
            return $user['nomRole'] == $role;
        }
        return false;
    }
}