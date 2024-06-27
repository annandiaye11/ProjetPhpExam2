<?php
namespace Anna\Model;

use Anna\Core\Model;

// require_once("../core/model.php");
class CategorieModel extends Model {
    public function __construct()
    {
        $this->openConn();
    }
    public function findAll():array {
        return $this->executeSelect("SELECT * FROM `Categorie`;");
    }
    public function save($data):int|bool {
        try {
            extract($data);
            $sql = "INSERT INTO Categorie(nomCategorie) VALUES ('$nomCategorie')";
            return $this->conn->exec($sql); 
        } catch (\PDOException $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function findByName(string $name): array | bool {
        return $this->executeSelect("SELECT * FROM `Categorie` c WHERE c.nomCategorie = '$name'", false);
    }
}