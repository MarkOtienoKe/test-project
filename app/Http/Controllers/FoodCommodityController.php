<?php

namespace App\Http\Controllers;

use App\FoodCommodity;
use Illuminate\Http\Request;

class FoodCommodityController extends Controller
{
    public function getFoodCommodities(Request $request)
    {
        $query = FoodCommodity::where('produce_variety','=',$request['product_variety'])
            ->whereYear('date', '=', $request['year'])
            ->where('commodity_type','=',$request['commodity_type'])
            ->get(['values_in_kshs','date']);

        $filteredData = array();

        //check if queried data is empty
        if($query->isEmpty()){

            return Null;
        }
        foreach($query as $data){
            //get month from date
            $month =date("M", strtotime($data['date']));
            $data['date'] = $month;

            //remove currency from value
            $data['values_in_kshs'] = preg_replace('/[^0-9-.]+/', '', $data['values_in_kshs']);

            $filteredData[] = $data;

        }
        return $filteredData;

    }
    public function getCommodityType(Request $request)
    {
            $productVarietyData = FoodCommodity::where('produce_variety', '=', $request['produce_variety'])
                ->distinct()->get(['commodity_type']);

            return $productVarietyData;

    }
    public  function getProductVarieties()
    {
        $query = FoodCommodity::select('produce_variety')->distinct()->get();

        return $query;
    }
}
