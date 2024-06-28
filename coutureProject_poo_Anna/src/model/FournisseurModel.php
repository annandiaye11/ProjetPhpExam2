<?php
namespace Anna\model;

use Anna\Core\Model;

class FournisseurModel extends Model
{
    public function __construct() {
        $this->openConn();
    }
    public function findAll(): array
    {
        return $this->executeSelect("SELECT * FROM `Fournisseur`;");
    }
    public function findOneById(int $id): array {
        return $this->executeSelect("SELECT * FROM `Fournisseur` WHERE  id = $id", false);
    }
    // public function save($data): int|bool
    // {
    //     try {
    //         extract($data);
    //         $sql = "INSERT INTO `Type`(nomType) VALUES('$nomType');";
    //         return $this->conn->exec($sql);
    //     } catch (\PDOException $e) {
    //         echo $e->getMessage();
    //         return false;
    //     }
    // }
    public function findByTel(string $tel): array | bool {
        return $this->executeSelect("SELECT * FROM `Fournisseur` f WHERE f.telephone = $tel", false);
    }
}