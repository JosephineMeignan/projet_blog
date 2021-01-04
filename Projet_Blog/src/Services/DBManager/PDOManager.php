<?php

namespace App\Services\DBManager;

use Exception;
use PDO;

class PDOManager implements DBManagerInterface {

    private PDO $pdo;

    public function __construct(){
        try {
            $this->pdo = new PDO ('mysql: host=' .$_ENV ['DB_HOST']. '; dbname='.$_ENV['DB_NAME'], $_ENV ['DB_USER'], $_ENV ['DB_PASSWORD']);
        } catch(Exception $exception) {
            die('Erreur lors de la connexion à la BDD:'. $exception->getMessage());
        }
    }

    
    public function findAll(string $table): array {
        $request = "SELECT * FROM $table";
        $statement = $this->pdo->query($request, PDO::FETCH_ASSOC);

        $result = [];
        while ($row = $statement->fetch()) {
            $result[] = $row;
        }

        return $result;
    }

    public function findOneBy(string $table, string $column, $value): ?array {
        $request = "SELECT * FROM $table WHERE $column ='$value' ";
        $statement = $this->pdo->query($request, PDO::FETCH_ASSOC);

        while ($row = $statement->fetch()) {
            return $row;
        }
        return null;
    }

    public function findBy(string $table, string $column, $value): array {
        $request = "SELECT * FROM $table WHERE $column ='$value' ";
        $statement = $this->pdo->query($request, PDO::FETCH_ASSOC);

        $result = [];

        while ($row = $statement->fetch()) {
            $result[] = $row;
        }
        return $result;

    }

    public function insert(string $table, string $request): void {
        $query = "INSERT INTO $table $request";
        $this->pdo->query($query);
    }

    public function update(string $table, string $request): void {
        $query = " UPDATE $table SET $request";
        $this->pdo->query($query);
    }

    public function delete(string $table, string $column, $value): void {
        $query ="DELETE FROM $table WHERE $column = '$value'";
        $this->pdo->query($query);
        
    }

}
