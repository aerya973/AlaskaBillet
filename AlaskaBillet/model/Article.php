<?php
// RECUPERE LES DONNEES DE FACON SECURISEE
class Article extends Model
{
    public $_id;
    private $_title;
    private $_content;
    private $_date;
    private $_img;

    //SETTER
    public function setId($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $this->_id = $id;
        }

    }
    public function setTitle($title)
    {
        if (is_string($title)) {
            $this->_title = $title;
        }

    }

    public function setContent($content)
    {
        if (is_string($content)) {
            $this->_content = $content;
        }
    }

    public function setDate($date)
    {
        $this->_date = $date;
    }

    public function setImg($img)
    {
        // if(file_exists($img))
        // {
        $this->_img = $img;
        // }
    }

    //GETTER
    public function getId()
    {
        return $this->_id;
    }

    public function getTitle()
    {
        return $this->_title;
    }
    public function getContent()
    {
        return $this->_content;
    }
    public function getDate()
    {
        return $this->_date;
    }

    public function getImg()
    {
        return $this->_img;
    }
}
