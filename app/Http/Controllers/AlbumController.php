<?php

namespace App\Http\Controllers;

// use App\Portfolio;
use Illuminate\Http\Request;
use File;
use App\Album;
use App\User;
use Auth;
use App\Portfolio;
use App\PortfolioImage;

class AlbumController extends Controller
{
    public function store(Request $request)
    {
       // dd($request->all());
        $this->authorize('update',Auth::user());
        
        $validator=$request->validate([
            'title'=>'required',
            'thumbnail'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
            'user_id' => 'required|exists:users,id'
            ]);
        
        $image = $request->file('thumbnail');
        $imageNewName = time().$image->getClientOriginalName();
        $image_path=request()->file('thumbnail')->storeAs('public/Uploads',$imageNewName);

        $Album=Album::create([
            'title'=>request('title'),
            'user_id'=>auth()->id(),
            'thumbnail'=>$imageNewName
        ]);
        return redirect()->back();   
    }

public function dropzoneStore(Request $request,$id)
    {
        
        $image = $request->file('fileImage');
        $imageNewName = $request->fileName;
        $image_path=request()->file('fileImage')->storeAs('public/Uploads',$imageNewName);
        if($image_path != 'null')
       { 
           PortfolioImage::create( [
            'album_id'=>$id,
            'path' => $imageNewName
        ] );
       }
       else
       {
            return response()->json(['Status'=>'success','Upload'=>'false']);
       }   
    } 

    public function Remove_Image(Request $request)
    {
        // Storage::disk('public')->delete('Uploads/'.$request->name);
        // return response()->json($request->has('name'));
        if($request->param['name'])
        {
            $request->name=$request->param['name'];
            // return response()->json($request->name);

        }
        $FilePath=public_path('storage/Uploads/'.$request->name);
        $FileName=$request->name;
        $portImage=PortfolioImage::where('path',$FileName)->delete();
        if(File::delete($FilePath))
        { 
                return response()->json(['status'=>'success','FileNewName'=>$FileName]);
           
        }
        else
         {
               
               return response()->json(['status'=>'failed']);
         }
    }

    public function ShowImage(Album $album)
    {
            $image=$album->Images()->get();
            // dd($abc)
            return response()->json($image);
    }
}