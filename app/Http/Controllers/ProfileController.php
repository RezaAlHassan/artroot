<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Art;


class ProfileController extends Controller
{
    public function profile()
    {   
        $user_id = auth()->user()->id; 
        if(Auth::check()){
            $arts=Art::where('user_id', $user_id)->get();
            return view('profile')->with('arts', $arts);
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }
   
    public function addArt()
    {
        if(Auth::check()){
            return view('add-art');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    public function uploadArt(Request $request)
    {
         
        $validatedData = $request->validate([
         'art' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);
 
        $art_name = $request->input('art_name');
        $art_category = $request->input('art_category');
        
        $file = $request->file('art') ;
        $fileName = str_replace(' ', '', $file->getClientOriginalName());
        $destinationPath = public_path().'/arts' ;
        $file->move($destinationPath,$fileName);
        
        $user_id = auth()->user()->id; 
 
        $save = new Art;
        $save->art_name = $art_name;
        $save->art_category = $art_category;
        $save->path = $fileName;
        $save->user_id = $user_id;
 
        $save->save();
 
      return redirect('add-art')->with('status', 'Your Artwork Has been uploaded')->with('art',$art_name);
 
    }

    /*public function displayImage($filename)
    {
        $path = storage_public($filename);

        if (!File::exists($path)) {
        abort(404);
        } 

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
}*/

}
