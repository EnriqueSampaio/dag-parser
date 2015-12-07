<?php

namespace App\Http\Controllers;

use PHPExcel_IOFactory;
use PHPExcel_Cell;
use App\Category;
use App\City;
use App\Helpers\Helper;
use App\Investiment;
use App\Keyword;
use App\Library\SheetHandler;
use Illuminate\Support\Facades\Redirect;
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

        $city = City::findOrFail($request->city);
        $tags = Keyword::get();
        $parser = new SheetHandler($request->file);

        if (empty($request->month)) {
            $investiments = $parser->extractInvestimentsEachonth();
            foreach ($investiments as $investiment) {
                foreach ($investiment as $month => $singleMonth) {
                    $flag = 1;
                    $singleMonth->city()->associate($city);
                    $singleMonth->made_at = $request->year . '-' . sprintf("%02s", $month);
                    foreach ($tags as $tag) {
                        if (strpos(mb_strtolower($singleMonth, 'UTF-8'), $tag) !== FALSE) {
                            $flag = 0;
                            $singleMonth->category()->associate(Category::findOrFail($tag->category_id));
                        }
                    }
                    if ($flag) {
                        $singleMonth->category->associate(Category::where('name', 'Outros')->firstOrFail());
                    }
                }
            }
        }

        // return Redirect::route('admin.investimentos.index');
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
