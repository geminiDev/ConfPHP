<?php

namespace App\Http\Controllers;

use App\Facades\MyCaptchat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\MailRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class MailController extends Controller
{

    public function createToMail(){
        $numberOne = rand(1,10);
        $numberTwo = rand(1,10);
        $question = 'Calculer la somme '.$numberOne.' + '.$numberTwo;
        $reponse = $numberOne + $numberTwo;

        //dd($question.'/'.$reponse);
        Session::put('captchat',$reponse);
        return view('blog.contact', compact('question'));
    }

    public function sendToMail(MailRequest $request){
        $rep = Session::get('reponse');

        if($rep == $request['captchat']){
            $email = $request->input('email');
            $content = $request->input('message');
            $date = Carbon::create()->format('d-m-Y H:i:s');
            Mail::send(['text'=>'email.contact'],compact('email','content', 'date'), function($message) use ($email){
                $message
                    ->to(env('EMAIL_ADMIN'))
                    ->subject('ConfPHP - Nouveau email')
                    ->from($email);
            });
            Session::forget('response');
            return redirect('contact')->with('message', 'Email envoyé');
        }
        else{
            return redirect('contact')->with('message', 'Vous n\'avez pas correctement répondu à la question');
        }
    }

}
