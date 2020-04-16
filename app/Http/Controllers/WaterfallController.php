<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Waterfall;
use App\Http\Resources\Waterfall as WaterfallResource;
use App\Http\Resources\WaterfallCollection;

class WaterfallController extends Controller
{
    
    public function index()
    {
        $waterfalls = Waterfall::all();
        return new WaterfallCollection($waterfalls);
    }

    public function show($id)
    {
        $waterfall = Waterfall::findorfail($id);
        return new WaterfallResource($waterfall);
    }

    public function searchByname($searchTerm){
        $waterfalls = Waterfall::where('properties.NAME', 'like', '%'.$searchTerm.'%')->orWhere('properties.ALTERNATE_NAME', 'like', '%'.$searchTerm.'%')->get();
        return new WaterfallCollection($waterfalls);
    }

    public function listByCommunity($community)
    {
        $waterfalls = Waterfall::where('properties.COMMUNITY','like', '%'.$community. '%')->get();
        return new WaterfallCollection($waterfalls);
    }

    public function listByCoordinates($longitude, $latitude)
    {
        $longitude = (double) $longitude;
        $latitude = (double) $latitude;
        $waterfalls = Waterfall::where('geometry','near', [
            '$geometry'=>[
                'type' => 'Point',
                'coordinates' => [$longitude, $latitude,],
            ],
            '$maxDistance' => 500],)->get();
        return new WaterfallCollection($waterfalls);

    }

    public function listWithPaginate($number)
    {
        $waterfalls = Waterfall::paginate((int)$number);
        return new WaterfallCollection($waterfalls);
    }

    
}
