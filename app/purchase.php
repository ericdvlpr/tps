<?php


class Purchase
{
    private $database_connect;
    public function __construct($db)
    {
        $this->database_connect = $db;
    }

    public function display_purchase()
    {
        $sql = "SELECT * FROM purchase";
        $stmt = $this->database_connect->prepare($sql);
        $stmt->execute();
        return  $stmt;
    }

    public function fill_product_list()
    {
        $query = "
        SELECT * FROM inventory 
        ";
        $statement = $this->database_connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $output = array();
        foreach ($result as $row) {
            $output .= '<option value="' . $row["id"] . '">' . $row["name"] . '</option>';
        }
        return json_encode($output);
    }
}
