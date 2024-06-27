<?php
namespace Anna\Model;

use Anna\Core\Model;

class UserModel extends Model
{
    public function __construct()
    {
        $this->openConn();
    }
    public function findByLoginPassword($data): array|bool
    {
        extract($data);
        $sql = "SELECT * FROM `Utilisateur` u, `Role` r WHERE u.roleId = r.Id AND u.login = '$login' AND u.password = '$password'";
        return $this->executeSelect($sql, false);

    }
}