<?php


namespace App\Services\Providers;


use App\Services\Contracts\Provider;
use App\Services\DataObjects\Data;
use Illuminate\Support\Collection;

class BestHotels implements Provider {

    public function search(Data $data) : Collection{

       $results = $this->getHotels($data);

       return collect($results)->map(fn ($hotel) => [
           'provider'  => $this->providerName(),
           'hotelName' => $hotel['hotel'],
           'fare'      => $hotel['hotelFare'],
           'hotelRate' => $hotel['hotelRate'],
           'amenities' => explode(',',$hotel['roomAmenities']),
       ]);
    }

    public function providerName(){
        return 'BestHotels';
    }

    private function getHotels($data){
        return [
            [
                'hotel'  => 'intercontentntal',
                'hotelFare'  => 5,
                'hotelRate'  => 5,
                'roomAmenities'  => 'pool,gym',
            ],
            [
                'hotel'  => 'AW hotel',
                'hotelFare'  => 0,
                'hotelRate'  => 0,
                'roomAmenities'  => 'gym,music room',
            ],
            [
                'hotel'  => 'Z hotel',
                'hotelFare'  => 10,
                'hotelRate'  => 10,
                'roomAmenities'  => 'pool',
            ]
        ];
    }

}
