<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\models\User;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{

    function publicMessage(Request $request){

        return response('A message has been received', 200);

    }

    function privateMessage(Request $request){

        /*if (!Auth::check()) {

//            return response('Unauthorized', 401);
            abort(403, 'Login first');

        }*/

        return response('A private message has been received', 200);

    }

    function login(Request $request){

        $credentials = [

            'email' => 'oreilly@example.com',
            'password' => 'password',

        ];

        if(Auth::attempt($credentials)){

//            return redirect()->intended('dashboard');

            return redirect()->route('dashboard');

        }

    }

    function logout(Request $request){

        Auth::logout();

        return redirect()->route('login');

    }

}
