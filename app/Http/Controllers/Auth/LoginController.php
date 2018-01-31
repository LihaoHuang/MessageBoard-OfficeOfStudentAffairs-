<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Adldap\Laravel\Facades\Adldap;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    public function username()
    {
        return 'InputAccount';
    }

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required', 'InputPassword' => 'required',
        ]);
    }

    public function login(Request $request){
        $this->validateLogin($request);

        if (Adldap::auth()->attempt(request()->get('InputAccount'), request()->get('InputPassword'))) {
            $search = Adldap::search()->where('cn', '=', request()->get('InputAccount'))->get();

            Session::put('per',$search[0]['cn'][0]);
            Session::put('name', $search[0]['attributes']['displayname'][0]);
            Session::put('email', $search[0]['attributes']['mail'][0]);
            Session::put('time', substr(Carbon::now(), 0, 16));

            $query = DB::select("select * from osa_per WHERE PER_ACC = " . $search[0]['cn'][0]);
            if ($query==[]){
                Session::put('is_per', false);
            }else{
                Session::put('is_per', true);
            }

            return redirect()->route('index');
        }else {
            return redirect()->back()->with("message","帳號密碼輸入錯誤!");
        }
    }

    public function logout(){
        Session::flush();
        return redirect()->route('index')->with("message","登出成功!");
    }

}
