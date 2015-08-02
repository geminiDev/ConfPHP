<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function createToMail(){
        return view('blog.contact');
    }

    public function sendToMail(MailRequest $request){
        $email = $request->input('email');
        $content = $request->input('message');
        $date = Carbon::create()->format('d-m-Y H:i:s');
        Mail::send(['text'=>'email.contact'],compact('email','content', 'date'), function($message) use ($email){
            $message
                ->to(env('EMAIL_ADMIN'))
                ->subject('ConfPHP - Nouveau email')
                ->from($email);
        });
        return redirect('contact')->with('message', 'Email envoyé');
    }

}
