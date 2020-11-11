<?php
class Inventory
{
    private $database_connect;

    public function __construct($db)
    {
        $this->database_connect = $db;
    }

    public function display_inventory()
    {

        $sql = "SELECT * FROM inventory";
        $stmt = $this->database_connect->query($sql);
        $stmt->execute();
        return  $stmt;
    }
}
