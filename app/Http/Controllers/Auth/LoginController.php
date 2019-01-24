<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\User;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

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

    protected $loginView;
     
     protected $username = 'login';
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
        $this->middleware('guest')->except('logout');
        $this->loginView = config('settings.theme').'.login';
    }
    public function showLoginForm()
    {
        //Auth::logout();
        //Auth::loginUsingId(1,true);
        dump($user = User::All());
        dump($rol = Role::All());
        dump($per = Permission::All());
        //dump($user);
        //echo '<br>'.$pas=Hash::make('testtest');
        //User::destroy(4);
        //$pas='testtest';
        //$sql = User::create(['name' => 'test','email' => 'test@test.test','password' => $pas, 'login' => 'test']);
        $view = property_exists($this, 'loginView')
                    ? $this->loginView : '';
        
        if (view()->exists($view)) {
            return view($view)->with('title', 'Вход на сайт');
        }

        abort(404);
    }
   
}
