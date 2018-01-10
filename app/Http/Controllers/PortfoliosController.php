<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use File;

class PortfoliosController extends Controller
{
    public function store()
    {
        request()->validate( [
            'title' => 'required',
            'user_id' => 'required|exists:users,id'
        ] );
        Portfolio::create( [
            'title' => request( 'title' ),
            'user_id' => auth()->id()
        ] );
    }






public function dropzoneStore(Request $request)
    {

        $image = $request->file('file');
        $imageNewName = $request->fileName;
        if($image->move(public_path('Uploads'),$imageNewName))
       { 
            return response()->json(['Status'=>'success','Upload'=>'true']);
       }
       else
       {
            return response()->json(['Status'=>'success','Upload'=>'false']);
       }   
    } 

    public function Remove_Image(Request $request)
    {
        
        $FilePath=public_path('Uploads/'.$request->name);

        if(File::delete($FilePath))
        { 
                return response()->json(['status'=>'success']);
           
        }
        else
         {
               
               return response()->json(['status'=>'failed']);
         }
    }
}