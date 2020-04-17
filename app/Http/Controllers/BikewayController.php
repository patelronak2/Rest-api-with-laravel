<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Bikeway;
use App\Http\Resources\Bikeway as BikewayResource;
use App\Http\Resources\BikewayCollection;

class BikewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikeways = Bikeway::all();
        return new BikewayCollection($bikeways);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bikeway = Bikeway::findorfail($id);
        return new BikewayResource($bikeway);
    }

    public function searchByname($searchTerm){
        $bikeways = Bikeway::where('properties.NAME', 'like', '%'.$searchTerm.'%')->get();
        return new BikewayCollection($bikeways);
    }

    public function searchByType($type){
        $bikeways = Bikeway::where('properties.TYPE', 'like', '%'.$type.'%')->get();
        return new BikewayCollection($bikeways);
    }

    public function searchByWard($ward){
        $bikeways = Bikeway::where('properties.WARD', 'like', '%'.$ward.'%')->get();
        return new BikewayCollection($bikeways);
    }

    public function lessThanGivenLength($length){
        $bikeways = Bikeway::where('properties.LENGTH_IN_METRES', '<', (double)$length)->get();
        return new BikewayCollection($bikeways);
    }

    public function moreThanGivenLength($length){
        $bikeways = Bikeway::where('properties.LENGTH_IN_METRES', '>', (double)$length)->get();
        return new BikewayCollection($bikeways);
    }

}