<?php


namespace App\models;

use App\core\dbModel;

class userRegister extends dbModel
{
    public $login = '';
    public $name = '';
    public $password = '';
    public string $table = 'users';

    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            'login' =>[self::RULE_REQUIRED],
            'name' =>[self::RULE_REQUIRED],
            'password' =>[self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>5], [self::RULE_MAX, 'max'=>12]],
        ];
    }

    public function registerUser()
    {
       return $this->create();
    }

    public function getAttributes(){
        return ['login', 'name', 'password'];
    }
}