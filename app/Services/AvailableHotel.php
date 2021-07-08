<?php


namespace App\Services;


use App\Services\DataObjects\Data;
use App\Services\Providers\BestHotels;
use App\Services\Providers\CrazyHotel;
use Illuminate\Support\Collection;

class AvailableHotel{

    protected array $providers = [
        BestHotels::class,
//        CrazyHotel::class
    ];

    public function searchHotels($data){

        $res = new Collection();

        foreach ($this->providers as $provider){
            $res->add(call_user_func(array( new $provider(), 'search' ),new Data($data)));
        }

       return $res->flatten(1)
           ->sortByDesc('hotelRate')
           ->values()
           ->toArray();
    }

}
