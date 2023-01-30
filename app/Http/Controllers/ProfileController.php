<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Art;
use Session;
use GuzzleHttp\Client;



class ProfileController extends Controller
{   
    public function profile()
    {   
        $user_id = auth()->user()->id; 
        $usertype = auth()->user()->usertype; 
        if(Auth::check() && $usertype == 2){
             $arts=Art::where('user_id', $user_id)->get();
            return view('profile')->with('arts', $arts); 
        }
  
        return redirect("home");
    }
   
    public function addArt()
    {   
        $usertype = auth()->user()->usertype; 
        if(Auth::check() && $usertype == 2){
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


    public function deleteArt($id)
    {   
        
        $filepath = Art::where('id', $id)->first()->path;
        if (File::exists(public_path('/art'.$filepath))) {
            ## Delete file
            File::delete(public_path('/art'.$filepath));
        }
        
        Art::where('id', $id)->delete(); //delete record

        return redirect('profile')->with('status', 'The artwork has been deleted');
    }

}
