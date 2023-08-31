<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Mail\subscribe;
use Illuminate\Support\Facades\Mail;
use Str;


class Subscribers extends Controller
{
    function index(){
        return view('welcome');
    }
    
    function subscribeWithMail(Request $request){
        $request->validate([
            'email' => 'required|email|unique:subscribed,email'
        ]);

        $data = [
            'email' => $request->email,
            'confirmation' => $this->generateCode(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
        DB::table('subscribed')->insert($data);

        Mail::to($request->email)->send(new subscribe($data));
        return back();
    }

    function generateCode(){
        $randomNumber = random_int(100000, 999999);
        return $randomNumber;
    }
}
