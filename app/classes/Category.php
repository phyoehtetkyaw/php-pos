<?php

class Category
{
    private $con;

    public function __construct()
    {
        $db = new DB();
        $this->con = $db->connect();
    }

    public function index()
    {
        $sql = "SELECT * FROM `categories` WHERE `deleted_at` IS NULL ORDER BY `id` DESC";
        $stmt = $this->con->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $res;
    }

    public function store(array $request): bool
    {
        try {
            if (isset($request["add-submit"])) {
                $name = htmlspecialchars($request["name"]);

                $sql = "INSERT INTO `categories` (`name`) VALUES (:name)";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam("name", $name, PDO::PARAM_STR);
                $stmt->execute();
    
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            print($e);
            return false;
        }
    }

    public function destroy(array $request): bool
    {
        try {
            if (isset($request["destroy-submit"])) {
                $id = intval($request["id"]);
                $deleted_at = date("Y-m-d H:i:s", time());

                $sql = "UPDATE `categories` SET `deleted_at`=:deleted_at WHERE `id`=:id";
                $stmt = $this->con->prepare($sql);
                $stmt->bindParam("deleted_at", $deleted_at, PDO::PARAM_STR);
                $stmt->bindParam("id", $id, PDO::PARAM_INT);
                $stmt->execute();
    
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            print($e);
            return false;
        }
    }
}

?>