<?php

namespace App\Http\Controllers\V2\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $redirectTo = RouteServiceProvider::ADMINDASHBOARD;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
    }

    /**
     * @return login page
     */
    public function loginPage(){
        return view('back.V2.auth.login');
    }

    public function login(Request $request)
    {

        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $messages = [
            'required' => 'Tələb olunan sahə',
            'min' => 'Şifrə ən az :min xarakter olmalıdır',
        ];
        Validator::make($request->all(), $rules, $messages)->validate();

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if(auth()->attempt(array($fieldType => $request->email, 'password' => $request->password )))
        {
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login.page')
                ->with('credentials', 'Şifrə və ya email uyğun deyil');
        }
    }

    /**
     * Log the user out.
     */
    public function logout()
    {
        auth()->logout();

        return redirect()->route('login.page')->with('message', 'Proqramdan çıxdınız');
    }

}
