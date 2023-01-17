<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\RegistrationController;
use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;

class RegisterController extends Controller
{
    public function create(){

        return view('register.create');
    }

    public function store(RegistrationController $request)
    {
        $data = request()->all();

        $data['password']=bcrypt($data['password']);

        $user = User::create($data);

        // login user

        auth()->user($user);

        // session()->flash('success','Your account has been created');

        return redirect('/')->with('success','Your account has been created');
        ;
    }
}
