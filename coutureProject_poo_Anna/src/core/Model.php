<?php
namespace Anna\Core;

use PDO;

class Model
{
    protected string $dns = 'mysql:host=localhost:3306;dbname=coutureDB';
    protected string $username = 'root';
    protected string $password = 'root';
    protected PDO|null $conn = null;
    public function openConn(): void
    {
        try {
            $this->conn = new PDO($this->dns, $this->username, $this->password);
        } catch (\PDOException $e) {
            echo "erreur lors de la connexion" . $e->getMessage();
        }
    }

    public function closeConn(): void
    {
        if (!is_null($this->conn)) {
            $this->conn = null;
        }
    }

    protected function executeSelect(string $sql, bool $all = true): array | bool
    {
        $stmt = $this->conn->query($sql);
        if ($all) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function findById(int $id): array {
        return $this->executeSelect("SELECT * FROM `Article` a WHERE a.id=$id", false);
    }
}
