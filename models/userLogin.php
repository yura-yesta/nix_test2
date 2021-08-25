<?php


namespace App\models;

use App\core\dbModel;

class userLogin extends dbModel
{
    public $login = '';
    public $password = '';
    public string $table = 'users';

    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            'login' =>[self::RULE_REQUIRED],
            'password' =>[self::RULE_REQUIRED, [self::RULE_MIN, 'min'=>5], [self::RULE_MAX, 'max'=>12]]
        ];
    }

    public function checkUserGo()
    {
        $res = $this->select(['login']);
        return $res[0]['password'] === $this->password;
    }

    public function userAccount()
    {
        return $this->select(['login'])[0];
    }

    public static function changeLogo()
    {
        session_start();
        $id = $_SESSION['user']['id'];
        if (!file_exists("../public/image/$id")){
            mkdir("../public/image/$id");
        }
        $image = $_FILES['image']['tmp_name'];
        return move_uploaded_file($image, "../public/image/$id/logo.jpeg");
    }
}