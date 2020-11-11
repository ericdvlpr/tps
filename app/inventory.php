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
        $sql = "SELECT inv.serial_no,  inv.name as productname, inv.description, inv.quantity,ct.name as category FROM inventory inv LEFT JOIN category ct ON inv.category_id = ct.id ";
        $stmt = $this->database_connect->query($sql);
        $stmt->execute();
        return  $stmt;
    }
}
