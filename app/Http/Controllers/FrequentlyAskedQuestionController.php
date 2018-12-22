<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrequentlyAskedQuestion;
use App\Categories;

class FrequentlyAskedQuestionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware('permission:faq-list');
        $this->middleware('permission:faq-create', ['only' => ['create','store']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = FrequentlyAskedQuestion::orderBy('id','DESC')->paginate(5);
        $categories = Categories::all();

        return view('faq.index',compact('data', 'categories'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::get()->toFlatTree()->pluck('name', 'id');

        return view('faq.create',compact('categories'));
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
            'question' => 'required',
            'answer' => 'required',
        ]);

        $input = $request->all();

        FrequentlyAskedQuestion::create($input);

        return redirect()->route('faq.index')
            ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = FrequentlyAskedQuestion::find($id);
        return view('faq.show',compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = FrequentlyAskedQuestion::find($id);
        $category = (int) $faq->categories_id;
        $categories = Categories::get()->toFlatTree()->pluck('name', 'id');;

        return view('faq.edit',compact('faq', 'category', 'categories'));
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
            'question' => 'required',
            'answer' => 'required',
        ]);

        $input = $request->all();

        $categorie = FrequentlyAskedQuestion::find($id);
        $categorie->update($input);

        return redirect()->route('faq.index')
            ->with('success','Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FrequentlyAskedQuestion::find($id)->delete();
        return redirect()->route('faq.index')
            ->with('success','Item deleted successfully');
    }
}
