<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function createToMail(){
        return view('email.index');
    }

    public function sendToMail(Request $request){
        $email = $request->input('email');
        $content = $request->input('message');
        $date = Carbon::create()->format('d-m-Y H:i:s');
        Mail::send(['text'=>'email.contact'],compact('email','content', 'date'), function($message) use ($email){
            $message
                ->to('juliengeorget@live.fr')
                ->subject('ConfPHP - Nouveau email')
                ->from($email);
        });
        return redirect('contact')->with('message', 'Email envoyé');
    }

}
