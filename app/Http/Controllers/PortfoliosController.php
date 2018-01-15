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
        $image_path=request()->file('file')->storeAs('public/Uploads',$imageNewName);
        // if($image->move(public_path('Uploads'),$imageNewName))
        if($image_path != 'null')
       { 
           Portfolio::create( [
            'title'=>'abc',
            'thumbnail' => $image_path,
            'user_id' => auth()->id()
        ] );
            return response()->json(['Status'=>'success','Upload'=>'true']);
       }
       else
       {
            return response()->json(['Status'=>'success','Upload'=>'false']);
       }   
    } 

    public function Remove_Image(Request $request)
    {
        // Storage::disk('public')->delete('Uploads/'.$request->name);
        $FilePath=public_path('storage/Uploads/'.$request->name);
        $FileName='public/Uploads/'.$request->name;
        $portImage=Portfolio::where('thumbnail',$FileName)->delete();
        if(File::delete($FilePath))
        { 
                return response()->json(['status'=>'success','FileNewName'=>$FileName]);
           
        }
        else
         {
               
               return response()->json(['status'=>'failed']);
         }
    }
}