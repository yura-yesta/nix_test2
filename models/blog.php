<?php


namespace App\models;

use App\core\dbModel;
use mysql_xdevapi\Table;

class blog extends dbModel
{
    public string $table = 'blogs';

    public  function gotBlog()
    {

        return $this->select(); // TODO: Change the autogenerated stub
    }

    public function rules(): array
    {
        // TODO: Implement rules() method.
    }
}
