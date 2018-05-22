<?php

namespace App\Http\Controllers;

use App\FoodCommodity;
use function compact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class FoodCommodityController extends Controller
{
    public function getFoodCommodities()
    {
        $productVariety = Input::get('product_variety');
        $year = Input::get('year');
        $productCommodity = Input::get('commodity_type');

        if (!isset($productVariety)) {
            $productVariety = 'Horticulture';
        }

        if (!isset($year)) {
            $year = '2012';
        }

        if (!isset($productCommodity)) {
            $productCommodity = 'Cabbages';
        }

        $pageData = collect([]);
        $pageData->put('title', 'Sales Graph');
        $pageData->put('product_variety', $productVariety);
        $pageData->put('commodity', $productCommodity);
        $pageData->put('year', $year);

        $query = FoodCommodity::where('produce_variety', '=', $productVariety)
            ->whereYear('date', '=', $year)
            ->where('commodity_type', '=', $productCommodity)
            ->get(['values_in_kshs', 'date']);

        $filteredData = array();

        //check if queried data is empty
        if ($query->isEmpty()) {

            return view('index')->with([
                'pageData' => $pageData,
                'graphData' => json_encode($filteredData, true),
            ]);
        }

        foreach ($query as $data) {
            //get month from date
            $month = date("M", strtotime($data['date']));
            $data['date'] = $month;

            //remove currency from value
            $data['values_in_kshs'] = preg_replace('/[^0-9-.]+/', '', $data['values_in_kshs']);

            $filteredData[] = $data;

        }

        return view('index')->with([
            'pageData' => $pageData,
            'graphData' => json_encode($filteredData, true),
        ]);

    }

    public function getCommodityType(Request $request)
    {
        $productVarietyData = FoodCommodity::where('produce_variety', '=', $request['produce_variety'])
            ->distinct()->get(['commodity_type']);

        return $productVarietyData;

    }

    public function getProductVarieties()
    {
        $query = FoodCommodity::select('produce_variety')->distinct()->get();

        return $query;
    }
}
