<?php

namespace App\Http\Controllers\AdminControl;

use Auth;
use Input;
use App\User;
use Helpers,Redirect;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\DbQueries\DGDatabase;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;




class AdminLoginController extends Controller
{
    public function __construct(){

        $this->_fetch_data = new DGDatabase();
    }

    public function login(){
            // dd(session('Status'));
		if (Auth::check()) {
			return Redirect::to(Helpers::admin_url("order"));
        }
            //filePath->admin.auth.login
			return view(Helpers::file_path("login"));
    }
	//look for the valid credential
	public function checkUserLogin(Request $request){
        $this->validate($request,[
            'name' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $name=$request->name;
        $password=$request->password;

       
        if (Auth::attempt(['name'=>$name,'password'=>$password])) {
            return Redirect::to(Helpers::admin_url("order"));
        }
        else{
        // dd('s');
        return Redirect::back()->withInput($request->input())->with('Status','Opps! You have entered invalid credentials');
        }
    }


    public function logout(){
        Auth::logout();
        return redirect(Helpers::admin_url());
    }

}
