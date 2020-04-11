<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
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
        Auth::logout();
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
   /* public function authenticate(Request $request)
    {
        //dd("dsfsdf");
        $password = $request->input('password');
        $email = $request->input('email');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            //dd(Auth::user());
            return redirect()->intended('/');
        } else {
            dd("hui");
        }
    }*/
    public function authenticate(Request $request)
    {
      //dd($request);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            //dd(Auth::user());
            //Auth::loginUsingId(1,true);
            return redirect()->intended('/admin');
        }
    }

}
