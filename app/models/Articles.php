<?php

class Articles
{

    private $id;
    private $title;
    private $sentence;
    private $content;
    private $date;
    private $author;
    private $category;

    /**
     * Articles constructor.
     * @param $id
     */
    function __construct($id){}


    static function getDataArticles($id){

        global $db;

        $id = str_secur($id);

        $reqArticle = $db->fetch('
            SELECT a.*, au.firstname, au.lastname, c.name AS category
            FROM articles a
            INNER JOIN authors au ON au.id = a.author_id
            INNER JOIN categories c ON c.id = a.category_id
            WHERE a.id = ?
        ',
        [$id],
        false);

        $data = $reqArticle;

        $this->id = $id;
        $this->title = $data['title'];
        $this->content = $data['content'];
        $this->sentence = $data['sentence'];
        $this->date = $data['date'];
        $this->author = $data['firstname'] . ' ' . $data['lastname'];
        $this->category = $data['category'];

        return getDataArticles();
    }

    /**
     * Envoie tous les articles
     * @return array
     */
    static function getAllArticles() {

        global $db;

        $reqArticles = $db->fetch('
            SELECT a.*, au.firstname, au.lastname, c.name AS category
            FROM articles a
            INNER JOIN authors au ON au.id = a.author_id
            INNER JOIN categories c ON c.id = a.category_id
        ',
        [],
        true);
        return $reqArticles;

    }

    static function getLastArticles($category = null) {

        global $db;
        if($category == null){
          $reqArticle = $db->fetch('
              SELECT a.*, au.firstname, au.lastname, c.name AS category
              FROM articles a
              INNER JOIN authors au ON au.id = a.author_id
              INNER JOIN categories c ON c.id = a.category_id
              ORDER BY id DESC
              LIMIT 1
          ',
          [],
          false);
          // $reqArticle->execute([]);
        }else{
          $reqArticle = $db->fetch('
              SELECT a.*, au.firstname, au.lastname, c.name AS category
              FROM articles a
              INNER JOIN authors au ON au.id = a.author_id
              INNER JOIN categories c ON c.id = a.category_id
              WHERE c.id = ?
              ORDER BY id DESC
              LIMIT 1
          ',
          [str_secur($category)],
          false);
        }

        return $reqArticle;
    }
  }
