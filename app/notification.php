<?php

class Notification
{
    private $database_connect;
    public $notification = array();
    public function __construct($db)
    {
        $this->database_connect = $db;
    }

    public function stock_notification()
    {
        $sql = "SELECT * FROM inventory";
        $stmt = $this->database_connect->query($sql);
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_CLASS) as $products) {
            if ($products->quantity < 1) {
                $notification = ([
                    "inventory" => $products->name . " has low quantity"
                ]);
            }
        }
        return $notification;
    }
}
