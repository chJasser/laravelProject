<?php

namespace App\Http\Controllers;

use App\Mail\Subscribe;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {

        Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers'
        ])->validate();



        $email = $request->all()['email'];
        $subscriber = Subscriber::create(
            [
                'email' => $email
            ]
        );

        if ($subscriber) {
            Mail::to($email)->send(new Subscribe($email));

            return redirect('/forums')->with('message', 'Thank you for subscribing to our email, please check your inbox !');
        }
    }
}
