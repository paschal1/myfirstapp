<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\driver;



class AdminController extends Controller
{
    //create redirect function 
    public function add_driver(){
        return view('admins.add_a_driver');
    }

    //create redirect function 
    public function add_user(){
        return view('admins.add_user');
    }

    
    //create redirect function 
    public function upload(request $request){

        $driver = new driver; 
        $image = $request->file;
        $imagename = time().'.'.$image ->getClientoriginalExtension();
        $request->file->move('Driversimage',$imagename);
        $driver->file = $imagename;
        $driver->name= $request->name;
        $driver->email= $request->email;
        $driver->phone= $request->phone;
        $driver->category= $request->category;
        $driver->city= $request->city;
        $driver->more= $request->more;
        $driver->save();
        return redirect()->back()->with('message','Drivers details Uploaded Successfully');

        
    }
    
}
