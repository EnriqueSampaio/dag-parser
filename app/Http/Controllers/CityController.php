<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use App\Http\Helpers;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();

        return view('admin.cities', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cities');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_get('America/Sao_Paulo');
        $request->name = ucfirst(strtolower($request->name));
        $this->validate($request, [
            'name'          => 'required||max:255',
            'population'    => 'required|numeric',
            'founded'       => 'required'
        ]);

        $year = substr($request->founded, 6);
        $month = substr($request->founded, 3,-5);
        $day = substr($request->founded, 0,-8);

        $city = new City;
        $city->name = $request->name;
        $city->population = $request->population;
        $city->founded = $year."-".$month."-".$day;
        $city->added_on = date('Y-m-d');
        $city->save();

        return Redirect::route('admin.cidades.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
