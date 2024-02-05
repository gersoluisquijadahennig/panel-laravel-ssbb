<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserPanel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


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

        $response = Http::post('http://apiloginlaravel.test/api/login', 
        [
            'run' => $request->input('run'),
            'password' => $request->input('password'),
        ]);

        //dd($response);
        

        if ($response->successful()) {
                               
            return redirect('/home');
        
        }else{
            // En caso de que las credenciales no coincidan
            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        }

            
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
