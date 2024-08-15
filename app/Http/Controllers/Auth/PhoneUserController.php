<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Log;

class PhoneUserController extends Controller
{
    public function create(): View
    {
        return view('auth.login-phone');
    }

    public function sendCode(Request $request)
    {
    	$request->validate([
            'phone' => ['required', 'phone:RU'],
        ]);

        $phone = '+' . preg_replace('/[^0-9]/', '', $request->phone);

        $random_code = random_int(100000, 999999);

        // Отправка sms кода через Job

        $request->session()->put('phone', $phone);
        $request->session()->put('code', $random_code);

        return response()->json([
		    'type' => 'success',
		    'code' => $random_code,//Временно
		]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'numeric', 'max:999999'],
        ]);

        if($request->session()->get('code') !=  $request->code)
        	return response()->json([
			    'type' => 'error',
			    'msg' => __('Неверный код или время действия истекло'),
			]);

        // Если пользователь с таким телефоном есть
        if(User::where('phone', $request->session()->get('phone'))->exists()) {
        	$user = User::where('phone', $request->session()->get('phone'))->first();

        	if($user->role_id != 1)
        		return response()->json([
				    'type' => 'error',
				    'msg' => __('Вы не можете войти'),
				]);

        	Auth::login($user);

        	$request->session()->regenerate();

        	return response()->json([
			    'type' => 'success',
			    'route' => route('profile'),
			]);
        }

        // Если нет регистируемся
        $user = User::create([
            'phone' => $request->session()->get('phone'),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->json([
		    'type' => 'success',
		    'route' => route('profile'),
		]);
    }
}
