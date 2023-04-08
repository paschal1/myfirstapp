<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Driver;
use App\Models\Booking;

class HomeController extends Controller
{
    //create redirect function 
    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->usertype== '0'){

                $driver = driver::all();

                return view('dashboard', compact('driver'));

            }else{

                return view('admins.home');
            }

            if(Auth::user()->usertype== '2'){

                return view('admin.home');

            }

        }else{

            return redirect()->back();
        }
    }

    public function index(){

    if (Auth::id()){

        return redirect('home');
    }else{

        $driver = driver::all();

        return view('dashboard', compact('driver'));
    }

        
    }

    //create redirect function 
    public function about_page(){
        return view('users.about');
    }

    //create redirect function 
    public function higher_page(){
        return view('users.high_purchase');
    }

    //create redirect function 
    public function car_page(){
        return view('users.buy_car');
    }

    //create redirect function 
    public function blog_page(){
        return view('users.blog');
    }

    //create redirect function 
    public function contact_page(){
        return view('users.contact');
    }

    public function upload_book(Request $request){
        $data = new booking;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->assistant = $request->assistant;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->status = 'In Progress';
        if(Auth::id()){
             $data->user_id = Auth::user()->id;
        }
       
        $data->save();

        return redirect()->back()->with('message','Your Message has been Sent Successfully. We contact you soon');

    }

    public function book_page(){

        return view('users.bookings');

    }
}
