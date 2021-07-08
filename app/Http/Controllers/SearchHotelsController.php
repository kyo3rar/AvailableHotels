<?php

namespace App\Http\Controllers;

use App\Services\AvailableHotel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SearchHotelsController extends Controller
{
    public function search(Request $request){


        try{
            $validatedData = $request->validate([
                'fromDate'       => 'required',
                'toDate'         => 'required',
                'city'           => 'required',
                'numberOfAdults' => 'required',
            ]);
        }catch (\Exception $e){
            return response($e->getMessage(),421);
        }

        $service = new AvailableHotel();

        $hotels = $service->searchHotels($validatedData);



        return response($hotels);
    }
}
