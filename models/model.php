<?php


namespace App\models;


abstract class model
{
    public  const RULE_REQUIRED = 'required';
    public  const RULE_EMAIL = 'email';
    public  const RULE_MIN = 'min';
    public  const RULE_MAX = 'max';
    public  const RULE_MATCH = 'match';

    abstract public function rules(): array;

    public function loadData($data){

        foreach ($data as $key => $value){
            if(property_exists($this, $key)){
                 $this->{$key} = $value ;
            }
        }

    }

    public array $errors = [];

    public function validate(){

        foreach ($this->rules() as $attribute => $rules ){
             $value = $this->{$attribute};

//var_dump($this->{$attribute});
            foreach ($rules as $rule){
                //var_dump($this->{$rules});
                $ruleName = $rule;
                if (!is_string($ruleName)){
                    $ruleName = $rule[0];
                    // print_r($rule[$ruleName]);


                }

                if($ruleName === self::RULE_REQUIRED && !$value){
                    $this->addError($attribute,self::RULE_REQUIRED);
                }
                if($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)){
                    $this->addError($attribute,self::RULE_EMAIL);
                }
                if($ruleName === self::RULE_MIN && strlen($value) < $rule[$ruleName] ){

                    $this->addError($attribute,self::RULE_MIN, $rule );
                }
                if($ruleName === self::RULE_MAX && strlen($value) > $rule[$ruleName] ){
                    $this->addError($attribute,self::RULE_MAX, $rule);
                }
                if($ruleName === self::RULE_MATCH && $value !== $this->pass){
                    // print_r($value . ' - це значення має бути рівним цьому -> '. $this->pass);

                    $this->addError($attribute,self::RULE_MATCH, $rule);

                }

            }

        }
        //print_r($this->pass2);
        return empty($this->errors);
    }

    public function addError( $attribute,  $rule, $param = [])
    {

        $message = $this->errorMessage()[$rule] ?? '';
        $message = str_replace("{{$rule}}", $param[$rule] , $message);
        $this->errors[$attribute][] = $message;
    }
    public function errorMessage()
    {
        return [
            self::RULE_REQUIRED =>'this field is required',
            self::RULE_EMAIL =>'this email is required',
            self::RULE_MIN =>'this length is so short {min}',
            self::RULE_MAX =>'you crazy man/ its so long {max}',
            self::RULE_MATCH =>'ne spivpaly passwords'
        ];
    }

}