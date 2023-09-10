<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use DB;
use App\Mail\subscribe;
use Illuminate\Support\Facades\Mail;
use Str;
use Redirect;
use App\Notifications\SubscribersNotification;
use Illuminate\Support\Facades\Notification;
use App\Events\SubscribeEvent;
use Illuminate\Notifications\Notifiable;

class SubscribersController extends Controller
{
    use Notifiable;

    function index(){
        return view('welcome');
    }
    
    function subscribeWithMail(Request $request){

        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        $data = [
            'email' => $request->email,
            'confirmation' => $this->generateCode(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
        event(new SubscribeEvent($data));

        return back();
    }

    function showAll(){
        $subscribers = DB::table('subscribers')->get();
        return view('pages.show')->with(
            [
                'subscribers' => $subscribers,
            ]);
    }

    function sendNotification(Request $request){
        // return redirect()->back()->with(['success' => 'Notification sent :)']);
        // return back()->with(['success' => 'Notification sent :)']);
        
        $users = Subscriber::get();
        $data = $request->notifMsg;

        $tags = [];
        foreach ($users as $key => $user) {
            $tags[] = $user;
        }
        Notification::send($users, new SubscribersNotification($data));
        return Redirect::back()->with(['success' => 'Notification sent successfully :)']);
    }

    function generateCode(){
        $randomNumber = random_int(100000, 999999);
        return $randomNumber;
    }
}
