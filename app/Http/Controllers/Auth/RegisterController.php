<?php
/**
 * Copyright (c) 29.11.2019.
 * File - RegisterController.php
 * Author - tor
 */

namespace App\Http\Controllers\Auth;

use App\Classes\ServerConfigClass;
use App\Classes\UserClass;
use App\Http\Controllers\Controller;
use App\Models\ServerConfig;
use App\Repositories\ServerConfigRepository;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    protected $serverConfig;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/email/verify';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->serverConfig = app(ServerConfigRepository::class);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        $createUser = User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
//
//        $createUser->DataUser()->create();
//
//        $updateUserCount = (new ServerConfigClass())->userCountUp(1);
//
//        if (!$updateUserCount) {
//            dd($updateUserCount);
//        }

        $createUser = (new UserClass())->createUser($data);

        return $createUser;
    }
}
