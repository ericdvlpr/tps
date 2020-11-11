<?php

class Category
{
    private $database_connect;
    public function __construct($db)
    {
        $this->database_connect = $db;
    }

    public function display_category()
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->database_connect->query($sql);
        $stmt->execute();
        return  $stmt;
    }
}
