<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserPanel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    public function login(Request $request)
    {
        
        $credentials = $this->credentials($request);

        $user = UserPanel::where('run',$credentials['run'])->first();

        if($user->password === $credentials['clave']){

            Auth::login($user);
            $request->session()->regenerate();

            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
                $request->session()->put('auth.dato1', 'dato1');
                $request->session()->put('auth.dato2', 'dato2');
                $request->session()->put('auth.dato3', 'dato3');
            }

            return $this->sendLoginResponse($request);
            }

            // En caso de que las credenciales no coincidan
            $this->incrementLoginAttempts($request);

            return $this->sendFailedLoginResponse($request);
    }
    public function username()
    {
        return 'run';
    }

    public function passwordFieldname()
    {   
        return 'clave';
    }

    protected function validateLogin(Request $request)
    {
       // dd($this->getClaveAttribute($request));

        $request->validate([
            $this->username() => 'required|string',
            $this->passwordFieldname() => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        //dd($request->only($this->username(), $this->passwordFieldname()));
        $credentials = $request->only($this->username(), $this->passwordFieldname()); // Reemplaza 'clave' con el nombre de tu campo de contraseña
        $credentials[$this->passwordFieldname()] = md5($credentials[$this->passwordFieldname()]);

        //dd($credentials);
        return $credentials;

    }

    public function getClaveAttribute(Request $request)
    {
        $pass = $request->only($this->passwordFieldname());

        return md5($pass['clave']);
    }    
}
