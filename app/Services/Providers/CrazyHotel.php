<?php


namespace App\Services\Providers;


use App\Services\Contracts\Provider;
use App\Services\DataObjects\Data;

class CrazyHotel implements Provider
{

    public function search(Data $data)
    {
        return[
            [
                'provider_name' => $this->providerName()
            ]
        ];
    }

    public function providerName()
    {
        return 'Crazy hotel';
    }
}
