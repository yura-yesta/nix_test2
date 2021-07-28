<?php


namespace App\core;


use App\controllers\controller;
use App\models\model;

abstract class dbModel extends model
{
    public function save(){

        $tableName = 'users';
        $attributes = ['login', 'name', 'password'];

        $params = array_map(fn($h) => ":$h", $attributes);

        $statement = self::prepare("INSERT INTO $tableName  (login, name, password) VALUE (:login, :name, :password)");



        foreach ($attributes as $attr){
            $statement->bindParam(":$attr", $this->{$attr}) ;
        }

        return $statement->execute();


    }
    public static function prepare($sql){
        return controller::$app->db->PDO->prepare($sql);
    }
    public function checkUser(){
        $tableName = 'users';
        $attributes = ['login', 'name', 'password'];

        $statement = self::prepare("SELECT * FROM $tableName  WHERE login = :login");
        $statement->bindParam(":login", $this->{'login'});
        $statement->execute();
        $res = $statement->fetch();
//        echo $res['password'];
//        echo $this->{'password'};
        if($res['password'] === $this->{'password'}){
            return true;
        }else{
            return false;
        }

    }
}