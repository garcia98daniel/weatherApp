<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
// Use Alert;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */



    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        $this->middleware('guest', ['except' => 'getLogout']);
      
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
   


//login

       protected function getLogin()
    {
        return view("login");
    }


       

    public function postLogin(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'password' => 'required',
        ]);



        $credentials = $request->only('name', 'password');

        if ($this->auth->attempt($credentials, $request->has('remember')))
        {
            return view("clima");
        }
        //else{
            //Alert::error('Verifique sus datos', 'error!');
        //}

    
    return view("login");

    }


//login

 //registro   


    protected function getRegister(){
        return view("register");
    }

    protected function postRegister(Request $request){

        $this->validate($request, [
            'Usuario' => 'required',
            'Password' => 'required',
            'Email' => 'required',
            'Ubicacion' => 'required',
        ]);


        $data = $request;


        $user=new User;
        $user->name=$data['Usuario'];
        $user->password=bcrypt($data['Password']);
        $user->ubicacion=$data['Ubicacion'];
        $user->admin="0";
        $user->email=$data['Email'];

        
        if($user->save()){
           //Alert::success('Registro exitoso');
             // alert()->success('Bienvenido','Registro exitoso');
            return redirect('login');
                
        }
    
        return "error al registrarse";
    }

//registro

    protected function getLogout(){
        $this->auth->logout();

        Session::flush();

        return redirect('login');
    }

}
