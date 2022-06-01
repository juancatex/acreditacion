<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
    }

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
        // $fileName = time().'.'.$request->file->getClientOriginalExtension();
        // $request->file->move(public_path('upload'), $fileName);

          $fileName = Str::random(15);
        // $fileName.='.jpg'; 
        // $fotoin = substr($request->foto, strpos($request->foto, ',') + 1); 
        // $fotoin = base64_decode($fotoin); 
        // Storage::put('public/socio/'.$fileName, $fotoin);
 
        $directory="public/datos";
        Storage::makeDirectory($directory); 
        Storage::append($directory.'/socio.csv',
        $fileName
        .';'.date("Y-m-d H:i:s") 
        .';'.$request->fuerza
        .';'.$request->grado
        .';'.$request->nombres
        .';'.$request->apaterno
        .';'.$request->amaterno
        .';'.$request->ci
        .';'.$request->ciext
        .';'.$request->foto
        .';'.$request->ruta);
        Auth::logout(); 
        return response()->json(array('msg' =>"ok"), 200);
    }
    public function asdfasdf()
    { 
        // $fileName = time().'.'.$request->file->getClientOriginalExtension();
        // $request->file->move(public_path('upload'), $fileName); 
       return Str::random(15); 
    }
}
