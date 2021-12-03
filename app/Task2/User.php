<?php

class User{
    public function load(int $id)
    {
        if ($id > 100){
            throw new Error(sprintf('Пользователь id = %d не найден в таблице User', $id));
        }
    }

    public function save(array $data): bool
    {
        return rand(0, 1);
    }
}