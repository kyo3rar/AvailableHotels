<?php


namespace App\Services\DataObjects;


class Data{

    protected array $data;

    public function __construct(array $data){
        $this->data = $data;
    }
}
