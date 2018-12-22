<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Categories;

class CategoriesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:categories-list');
        $this->middleware('permission:categories-create', ['only' => ['create','store']]);
        $this->middleware('permission:categories-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:categories-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Categories::get()->toTree();

        return view('categories.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Categories::whereIsRoot()->get()->pluck('name', 'id');
        $this->addNullableParent($parents);

        return view('categories.create',compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        Categories::create($input);

        return redirect()->route('categories.index')
            ->with('success','Categorie created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categories::find($id);
        return view('categories.show',compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categories::find($id);
        $parent = (int) $categorie->parent_id;
        $parents = Categories::whereIsRoot()->get()->pluck('name', 'id');
        $this->addNullableParent($parents);

        return view('categories.edit',compact('categorie','parent','parents'));
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        $input = $request->all();

        $categorie = Categories::find($id);
        $categorie->update($input);

        return redirect()->route('categories.index')
            ->with('success','Categorie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categories::find($id)->delete();
        return redirect()->route('categories.index')
            ->with('success','Categorie deleted successfully');
    }

    /**
     * @param Collection $parents
     */
    private function addNullableParent(Collection $parents)
    {
        $parents->put(0, '');
    }
}
