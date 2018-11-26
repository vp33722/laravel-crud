<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Domain\Admin\Datatables\UserDatatableScope;
use App\Application;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        view()->share('route','master');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDatatableScope $datatable)
    {
        if (request()->ajax()) 
         {
            return $datatable->query();
         }
         return view('home',['html'=>$datatable->html(),'application'=>Application::all()->pluck('name','id')->toArray()]);
    }
}
