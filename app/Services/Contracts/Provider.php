<?php


namespace App\Services\Contracts;


use App\Services\DataObjects\Data;

interface Provider{

    public function search(Data $data);

    public function providerName();
}
