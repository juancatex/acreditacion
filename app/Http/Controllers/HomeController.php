<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function saveimg(Request $request)
    { 
        $fileName = time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('upload'), $fileName);
        $directory="Socios";
        Storage::makeDirectory($directory); 
        Storage::append($directory.'/socio.csv',date("Y-m-d H:i:s").';prueba;'.$fileName);
        return response()->json(array('msg' =>$request->user), 200);
    }
}
