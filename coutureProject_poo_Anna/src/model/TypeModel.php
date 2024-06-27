<?php
namespace Anna\model;

use Anna\Core\Model;

class TypeModel extends Model
{
    public function __construct() {
        $this->openConn();
    }
    public function findAll(): array
    {
        return $this->executeSelect("SELECT * FROM `Type`;");
    }
    public function save($data): int|bool
    {
        try {
            extract($data);
            $sql = "INSERT INTO `Type`(nomType) VALUES('$nomType');";
            return $this->conn->exec($sql);
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function findByName(string $name): array | bool {
        return $this->executeSelect("SELECT * FROM `Type` t WHERE t.nomType = '$name'", false);
    }
}