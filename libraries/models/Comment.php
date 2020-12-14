<?php

namespace Models;

class Comment extends Model
{
    protected $table="comments";

    //1. Récupération des commentaires d'un article.
    public function findAllWithArticle(int $id): array
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
        $query->execute(['article_id' => $id]);
        $commentaires = $query->fetchAll();
        return $commentaires; //elle renverra faux si elle n'a pas trouver.

    }

    //2. Insertion d'un commentaire dans un article 
    public function insert($variables=[]): void
    {
        extract($variables);
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));

    }

}