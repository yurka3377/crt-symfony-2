<?php

class UserFormValidator{

    private function checkName(string $name)
    {
        if (strlen($name) == 0){
            throw new Error('Длинна имени должна быть > 0 ');
        }
    }


    private function checkAge(int $age)
    {
        if ($age < 18){
            throw new Error(sprintf('Возраст должен быть > 18 (возраст = %d)', $age));
        }
    }


    private function checkEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            throw new Error(sprintf('Некорректный email (email = %s)', $email));
        }
    }


    public function validate(array $data){
        $this->checkName($data['name']);
        $this->checkAge($data['age']);
        $this->checkEmail($data['email']);
    }
    
}
