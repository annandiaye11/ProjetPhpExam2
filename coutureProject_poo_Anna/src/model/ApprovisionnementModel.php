<?php
namespace Anna\model;

use Anna\Core\Model;
use Anna\Model\PanierModel;

class ApprovisionnementModel extends Model
{
    public function __construct() {
        $this->openConn();
    }
    public function findAll(): array
    {
        return $this->executeSelect("SELECT * FROM `Appo`;");
    }
    public function save(PanierModel $panier): int
    {
        try {
            $userId = $_SESSION['user']['id'];
            $date = new \DateTime();
            $date = $date->format('Y-m-d');
            $sql = "INSERT INTO `Appo` (`date`, `montant`, `idFour`, `idRs`) VALUES ('$date', $panier->total, $panier->fournisseur,$userId);";
            $this->conn->exec($sql);
            foreach( $panier->articles as $article){
                $qteAppro = $article['qteAppro'];
                $qteStock = $article['qteStock'];
                $idArticle = $article['id'];
                $idAppro = $this->conn->lastInsertId();
                $sql = "INSERT INTO `detail` (`qte`, `idArticle`, `idAppro`) VALUES ($qteAppro, $idArticle, $idAppro);";
                $this->conn->exec($sql);
                $sql = "UPDATE 'article' SET `qteStock` = $qteStock+$qteAppro WHERE article.id = $idArticle;";
            }
        } catch (\PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        return 1;
    }
    public function findByName(string $name): array | bool {
        return $this->executeSelect("SELECT * FROM `Type` t WHERE t.nomType = '$name'", false);
    }
}