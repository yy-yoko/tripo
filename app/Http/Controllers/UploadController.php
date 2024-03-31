<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trippost;

class UploadController extends Controller
{
    public function index(){

    	return view('tripposts.photo');
    }
    
    public function store(Request $request){

        $file_name = $request->file('file')->getClientOriginalName();
        
        $request->file('file')->storeAs('public',$file_name);
        
        $data = $request->all();
        $image = $request->file('image');
        
        if($request->hasFile('image')){
            $path = \Storage::put('/public',$image);
            $path = explode('/',$path);
        }else{
            $path = null;
        }
        
        return back();
    }
}
