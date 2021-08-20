<?php


namespace App\core;

use App\controllers\controller;
use App\models\model;
use PDO;

abstract class dbModel extends model
{
    public function save()
    {
        $attributes = ['login', 'name', 'password'];
        $statement = self::prepare("INSERT INTO users  (login, name, password) VALUE (:login, :name, :password)");
        foreach ($attributes as $attr) {
            $statement->bindParam(":$attr", $this->{$attr}) ;
        }
        return $statement->execute();
    }

    public function update($id)
    {
        $arr = controller::$app->request->getbody();
        $attributes = [];
        $bindParam = [];
        foreach ($arr as $attr => $item) {
            if(!empty($item)) {
                $attributes[] = $attr.' = :'.$attr;
                $bindParam[] = $attr;
            }
        }
        $imp = implode(', ', $attributes);
        $statement = self::prepare("UPDATE users SET $imp WHERE id = $id ");
        foreach ($bindParam as $attr ) {
            $statement->bindParam(":$attr", $this->{$attr});
        }
        return $statement->execute();
    }

    public static function selectBlog($table)
    {
        $statement = self::prepare("SELECT * FROM $table");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function prepare($sql)
    {
        return controller::$app->db->PDO->prepare($sql);
    }

    public function checkUser()
    {
        $statement = self::prepare("SELECT * FROM users  WHERE login = :login");
        $statement->bindParam(":login", $this->{'login'});
        $statement->execute();
        $res = $statement->fetch();
        if($res['password'] === $this->{'password'}){
            return true;
        }
        else{
            return false;
        }
    }

    public function gotUser()
    {
        $statement = self::prepare("SELECT * FROM users  WHERE login = :login");
        $statement->bindParam(":login", $this->{'login'});
        $statement->execute();
        $res = $statement->fetch();
        return $res;
    }
}