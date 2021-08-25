<?php


namespace App\core;

use App\controllers\controller;
use App\models\model;
use PDO;

abstract class dbModel extends model
{
    public static function prepare($sql)
    {
        return controller::$app->db->PDO->prepare($sql);
    }

    public function create()
    {
        $params = array_map(fn($h) => ":$h", $this->getAttributes());
        $statement = self::prepare("INSERT INTO $this->table  (".implode(', ', $this->getAttributes()).") VALUE (".implode(', ', $params).")");
        foreach ($this->getAttributes() as $attr) {
            $statement->bindParam(":$attr", $this->{$attr}) ;
        }
        return $statement->execute();
    }

    public function update($id)
    {
       $attributes =[] ;
       foreach ($this->getAttributes() as $attr){
           if(!empty($this->{$attr})){
               $attributes[] = $attr;
           }
       }
       $params = array_map(fn($h) => "$h = :$h", $attributes);
       $statement = self::prepare("UPDATE users SET ".implode(', ', $params)." WHERE id = :id ");
       foreach ($attributes as $attr){
           $statement->bindParam(":$attr", $this->{$attr});
       }
       $statement->bindParam(':id', $id);
       return $statement->execute();
    }

    public function select($attributes = null)
    {
        if($attributes !== null){
            $params = array_map(fn($h) => "$h = :$h", $attributes);
            $statement = self::prepare("SELECT * FROM $this->table WHERE ".implode(' or ', $params));
            foreach ($attributes as $attr){
                $statement->bindParam(":$attr",$this->{$attr} );
            }
        }else{
            $statement = self::prepare("SELECT * FROM $this->table");
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}