<?php
namespace Anna\Model;

use Anna\Core\Model;

// require_once ("../core/model.php");
class ArticleModel extends Model
{
    public function __construct()
    {
        $this->openConn();
    }
    public function findAll($page = 0, $offset = 2): array
    {
        $sql = "SELECT 
        a.*,
        a.id, 
        a.nomArticle, 
        a.prixAppro, 
        a.qteStock, 
        a.categoryId, 
        a.typeId,
        c.id AS category_id,
        c.nomCategorie,
        t.id AS type_id,
        t.nomType 
    FROM 
        Article a
    JOIN 
        Categorie c ON a.categoryId = c.id
    JOIN 
        Type t ON a.typeId = t.id
    LIMIT $page, $offset
    ";

    $snd_sql = "SELECT count(*) as `nbreArticle` FROM Article;";
    $result = $this->executeSelect($snd_sql);

    $r = $this->executeSelect($sql);
        return [
            "totalElements" => count($r),
            "articles" => $r,
            "pages" => ceil(count($r)/$offset)
        ];
        
    }
    public function findBy(int $id): array
    {
        $sql = "SELECT 
        a.*  
    FROM 
        Article a
    WHERE id=$id;
    ";
        return $this->executeSelect($sql, true);
    }
    public function save(array $data): void
    {
        try {
            extract($data);
            $sql = "INSERT INTO Article(nomArticle, prixAppro, qteStock, categoryId, typeId) VALUES ('$nomArticle', '$prixAppro', '$qteStock', '$categoryId', '$typeId');";
            $this->conn->exec($sql);
        } catch (\PDOException $e) {
            echo "erreur de connexion bdd : " . $e->getMessage();
            die();
        }
    }

    public function delete(int $id): void
    {
        try {
            $sql = "DELETE FROM `Article` WHERE `Article`.`id` = $id ";
            $this->conn->exec($sql);
        } catch (\PDOException $e) {
            echo "erreur lors de la suppression : " . $e->getMessage();
        }
    }

    public function update(int $id, array $data): void
    {
        try {
            extract($data);
            $sql = "UPDATE `Article` SET `nomArticle` = '$nomArticle', `prixAppro` = '$prixAppro', `qteStock` = '$qteStock', `categoryId` = '$categoryId', `typeId` = '$typeId' WHERE `Article`.`id` = $id;";
            $this->conn->exec($sql);
        } catch (\PDOException $e) {
            echo "erreur lors de la suppression : " . $e->getMessage();
        }
    }
}
