<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\LiveMusicVenue;
use App\Http\Resources\LiveMusicVenue as LiveMusicVenueResource;
use App\Http\Resources\LiveMusicVenueCollection;

class LiveMusicVenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $liveMusicVenues = LiveMusicVenue::all();
        return new LiveMusicVenueCollection($liveMusicVenues);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $liveMusicVenue = LiveMusicVenue::findorfail($id);
        return new LiveMusicVenueResource($liveMusicVenue);
    }

    public function listByCity($city)
    {
        $liveMusicVenues = LiveMusicVenue::where('properties.city','like', '%'.$city.'%')->get();
        return new LiveMusicVenueCollection($liveMusicVenues);
    }

    public function listWithPaginate($number)
    {
        $liveMusicVenues = LiveMusicVenue::paginate((int)$number);
        return new LiveMusicVenueCollection($liveMusicVenues);
    }

    public function searchByname($searchTerm){
        $liveMusicVenues = LiveMusicVenue::where('properties.name', 'like', '%'.$searchTerm.'%')->get();
        return new LiveMusicVenueCollection($liveMusicVenues);
    }

    /**
        Display a list of Live Music Venues with the 500M of the provided
        Coordinates sorted from nearest to farthest
    */
    public function listByCoordinates($longitude, $latitude)
    {
        $longitude = (double) $longitude;
        $latitude = (double) $latitude;
        $liveMusicVenues = LiveMusicVenue::where('geometry','near', [
            '$geometry'=>[
                'type' => 'Point',
                'coordinates' => [$longitude, $latitude,],
            ],
            '$maxDistance' => 500],)->get();
        return new LiveMusicVenueCollection($liveMusicVenues);

    }

}
