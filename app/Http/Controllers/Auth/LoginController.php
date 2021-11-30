<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Larravel Passport の認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('laravelpassport')
            // ->with(['hd' => 'example.com'])
            ->redirect();
    }

    /**
     * Larravel Passport からユーザー情報を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('laravelpassport')->stateless()->user();
        // $user = Socialite::driver('laravelpassport')->user();

        require_once 'PEAR/Var_Dump.php';
        \Var_Dump::displayInit(array('display_mode' => 'HTML4_Table'));
        @header("Content-type: text/html; charset=utf-8");
        \Var_Dump::display( $user );
        die();

        logger(print_r($user, true));
        return json_encode($user);
    }
}
