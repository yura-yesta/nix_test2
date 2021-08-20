<?php


namespace App\models;

use App\core\dbModel;

class userChangeInfo extends dbModel
{
    public $login = '';
    public $name = '';
    public $password = '';

    public function rules(): array
    {
        // TODO: Implement rules() method.
        if ($this->password){
            return ['password' =>[self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>5], [self::RULE_MAX, 'max'=>12]]];
        }
        if (!$this->login && !$this->name){
            return
        [
            'login' =>[self::RULE_REQUIRED],
            'name' =>[self::RULE_REQUIRED]
        ];
        }
        else{
            return [];
        }
    }

    public function changeUserInfo($id)
    {
        return $this->update($id);
    }
}