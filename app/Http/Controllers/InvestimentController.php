<?php

namespace App\Http\Controllers;

use PHPExcel_IOFactory;
use PHPExcel_Cell;
use App\Category;
use App\City;
use App\Investiment;
use App\Keyword;
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
        $investiments = array();
        $investimentIdx = 0;
        $tags = Keyword::get();
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
                    $investiments[$investimentIdx] = array();
                    $value = PHPExcel_Cell::columnIndexFromString($cell->getColumn());
                    if ($value == array_keys($columns, max($columns))[0]) {
                        $flag = TRUE;
                        foreach ($tags as $tag) {
                            if (strpos(strtolower($cell->getValue()), $tag->name) !== FALSE) {
                                $flag = FALSE;
                                $category = Category::findOrFail($tag->category_id);
                                for ($i=1; $i <= 12; $i++) {
                                    $investiments[$investimentIdx]['column'] = $cell->getColumn();
                                    $investiments[$investimentIdx]['row'] = $cell->getRow();
                                    $investiments[$investimentIdx][$i] = new Investiment;
                                    $investiments[$investimentIdx][$i]->category()->associate($category);
                                    $investiments[$investimentIdx][$i]->city()->associate($city);
                                    $investiments[$investimentIdx][$i]->name = $cell->getValue();
                                }
                                break;
                            }
                        }
                        if ($flag) {
                            $category = Category::where('name', 'Outros')->firstOrFail();
                            for ($i=1; $i <= 12; $i++) {
                                $investiments[$investimentIdx]['column'] = $cell->getColumn();
                                $investiments[$investimentIdx]['row'] = $cell->getRow();
                                $investiments[$investimentIdx][$i] = new Investiment;
                                $investiments[$investimentIdx][$i]->category()->associate($category);
                                $investiments[$investimentIdx][$i]->city()->associate($city);
                                $investiments[$investimentIdx][$i]->name = $cell->getValue();
                            }
                        }
                    } else if (isset($investiments[$investimentIdx]['row']) && $cell->getRow() === $investiments[$investimentIdx]['row'] && $month = ord($cell->getColumn()) - ord($investiments[$investimentIdx]['column']) >= 1 && $month <= 12) {
                        $investiments[$investimentIdx][$month]->value = $cell->getValue();
                        $investiments[$investimentIdx][$month]->made_at = $request->year.'-'.$month;
                    }
                }
                $investimentIdx++;
            }

            foreach ($investiments as $investiment) {
                foreach ($investiment as $singleMonth) {
                    echo $singleMonth->name.' '.$singleMonth->value.' '.$singleMonth->date.'<br>';
                    $singleMonth->save();
                }
            }
        } else {
            # code...
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
