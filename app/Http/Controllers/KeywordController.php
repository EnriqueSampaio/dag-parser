<?php

namespace App\Http\Controllers;

use App\Category;
use App\Keyword;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Keyword::orderBy('name')->get();
        $categories = Category::orderBy('name')->select('name')->get();

        foreach ($categories as $key => $category) {
            $categories[$key] = $category->name;
        }

        return view('admin.keywords', ['tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $request->name = ucfirst(strtolower($request->name));
        $this->validate($request, [
            'name'      => 'required|unique:keywords|max:255',
            'category'  => 'required',
        ]);
        $category = Category::where('name', $request->category)->select('id')->first();

        $tag = new Keyword;
        $tag->name = $request->name;
        $tag->category_id = $category->id;
        $tag->save();

        return Redirect::route('admin.tags.index');
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
