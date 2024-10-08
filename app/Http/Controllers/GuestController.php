<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GuestController extends Controller
{
    public function homePage(){

        return view('guest.home');
    }

    public function aboutPage(){

        return view('guest.about');
    }

    public function galleryPage(){
        $photos = Gallery::paginate(6);
        return view('guest.gallery' ,compact('photos'));
    }

    public function servicePage(){
        $services = Service::select('services.*','categories.name as category_name')
        ->leftjoin('categories','services.category_id','categories.id')
        ->get();
        return view('guest.service',compact('services'));
    }

    public function contactPage(){
        return view('guest.contact');
    }

    public function contact(Request $request)
    {
        $this->contactValidationCheck($request);
        $userContact = $this->getMessage($request);
        Contact::create($userContact);
        return redirect()->route('guest#contactPage')->with(['contactSuccess' => 'သင်၏စာတိုပေးပို့မှုအောင်မြင်ပါသည်။']);
    }


    public function notFoundPage(){
        return view('404Page');
    }

    public function check()
    {
        if(!Auth::check()){

            return redirect()->route("guest#loginPage");
        }
    }

    public function guestLoginPage()
    {
        return view('guest.guestLogin');
    }

    public function guestLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user#servicePage');
        }

        return back()->withErrors([
            'email' => 'မှတ်ပုံတင်ထားပီးသားအကောင့်တစ်ခုလိုအပ်ပါသည်။အကောင့်ဝင်ရန်မှတ်ပုံတင်ပါ။',
        ]);
    }

    private function contactValidationCheck($request){
        $validationData = [
            'name' => 'required',
            'email' => 'required',
            'feedback' => 'required'
        ];

        Validator::make($request->all(),$validationData)->validate();
    }

    private function getMessage($request)
    {
        return[
            'name' => $request->name,
            'email' => $request->email,
            'feedback' => $request->feedback
        ];
    }

}
