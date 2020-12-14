<?php

namespace Models;

abstract class Model
{
    protected $pdo;
    protected $table;
    //Constructeur
    public function __construct()
    {
        $this->pdo = \Database::getPdo(); // le antislash devant c'est pour l'autoloading
    }
    //1. Recherche d'un article grace a son id
    public function find(int $id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id"); 
        $query->execute(['id' => $id]);
        $item = $query->fetch();
        return $item; 
    }

    //2. Suppression d'un article grace a son id
    public function delete(int $id): void
    {
        $query = $this->pdo->prepare("DELETE FROM $this->table WHERE id = :id");
        $query->execute(['id' => $id]);
    }
    //3. Recherche tout les elements d'une table
    public function findAll(?string $order=""): array
    {
        $sql="SELECT * FROM $this->table";
        if($order)
        {
            $sql.=" ORDER BY ".$order;
        }
        $resultats = $this->pdo->query($sql);
        $items = $resultats->fetchAll();
        return $items; 
    }

}