<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterStoreRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Jobs\RegisterStore;
use phpDocumentor\Reflection\Types\AbstractList;

class UserController extends Controller
{


    public function create()
    {
        return view('.riode.singup.register');
    }

    public function store(RegisterStoreRequest $request)
    {

        try {
            $user = $this->dispatchNow(new RegisterStore($request));
        } catch (\Exception $exception) {
            abort(403, $exception->getMessage());
        }

        /*edit*/

        //$user->save();
        Auth::login($user);
        session()->flash('success', 'User registered successfully!');

        return redirect()->back();
    }

    public function login(LoginRequest $request)
    {
        if ($request->isMethod('get')){
            return view('riode.singup.login');
        }

        $check = $request;
        if (Auth::attempt([
            'email' => $request->log_email,
            'password' => $request->log_pass,
        ])) {
            return redirect()->route('index');
        }

        return redirect()->back()->with('error', 'Incorrect login or password!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('store.login');
    }

}
