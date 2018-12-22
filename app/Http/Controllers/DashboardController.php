<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $data = Categories::get()->toTree();
        return view('dashboard',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }
}
