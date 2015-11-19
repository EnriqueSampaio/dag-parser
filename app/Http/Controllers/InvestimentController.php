<?php

namespace App\Http\Controllers;

use PHPExcel_IOFactory;
use PHPExcel_Cell;
use App\City;
use App\Investiment;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InvestimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::orderBy('name')->get();
        $selector = array();

        foreach ($cities as $city) {
            $selector[$city->id] = $city->name;
        }

        return view('admin.investiment', ['cities' => $selector]);
    }

    /**
     * Extract data from spreadsheet and store it as investiments.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function parser(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            'city'  => 'required',
            'year' => 'required',
        ]);

        echo $request->month;

        $parser = PHPExcel_IOFactory::load($request->file);
        $columns = array_fill(1, PHPExcel_Cell::columnIndexFromString($parser->getActiveSheet()->getHighestColumn()), 0);

        foreach ($parser->getActiveSheet()->getRowIterator() as $row) {
            foreach ($row->getCellIterator() as $cell) {
                if (preg_match("/[a-z]/i", $cell->getValue())) {
                    $columns[PHPExcel_Cell::columnIndexFromString($cell->getColumn())]++;
                }
            }
        }

        if (empty($request->month)) {
            foreach ($parser->getActiveSheet()->getRowIterator() as $row) {
                foreach ($row->getCellIterator() as $cell) {
                    if (PHPExcel_Cell::columnIndexFromString($cell->getColumn()) == array_keys($columns, max($columns))[0]) {
                        echo $cell->getValue() . '<br>';
                    }
                }
            }
        } else {
            # code...
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
