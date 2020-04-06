<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
                //Auth::logout();
              //  Auth::loginUsingId(1,true);
                //  dump($user = User::All());
                //  dump($rol = Role::All());
                 // dump($per = Permission::All());
                 // dd(Auth::user());
                  //dump($user);
                  //echo '<br>'.$pas=Hash::make('testtest');
                  //User::destroy(4);
                  //$pas='testtest';
                  //$sql = User::create(['name' => 'test','email' => 'test@test.test','password' => $pas, 'login' => 'test']);
        $this->middleware('guest')->except('logout');
    }
}
