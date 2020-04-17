<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Campground;
use App\Http\Resources\Campground as CampgroundResource;
use App\Http\Resources\CampgroundCollection;

class CampgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campgrounds = Campground::all();
        return new CampgroundCollection($campgrounds);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campground = Campground::findorfail($id);
        return new CampgroundResource($campground);
    }

    public function listByCommunity($community)
    {
        $campgrounds = Campground::where('properties.COMMUNITY','like', '%'.$community.'%')->get();
        return new CampgroundCollection($campgrounds);
    }

    public function listWithPaginate($number)
    {
        $campgrounds = Campground::paginate((int)$number);
        return new CampgroundCollection($campgrounds);
    }

    public function searchByname($searchTerm){
        $campgrounds = Campground::where('properties.NAME', 'like', '%'.$searchTerm.'%')->get();
        return new CampgroundCollection($campgrounds);
    }

    /**
        Display a list of Campgrounds within 500M of the provided
        Coordinates sorted from nearest to farthest
    */
    public function listByCoordinates($longitude, $latitude)
    {
        $longitude = (double) $longitude;
        $latitude = (double) $latitude;
        $campgrounds = Campground::where('geometry','near', [
            '$geometry'=>[
                'type' => 'Point',
                'coordinates' => [$longitude, $latitude,],
            ],
            '$maxDistance' => 500],)->get();
        return new CampgroundCollection($campgrounds);

    }

    
}