<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\users;
use Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller{
    
    public function postSignUp(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);
        $username=$request['username'];
        $password=bcrypt($request['password']);
        
        $users=new users();
        $users->username=$username;
        $users->password=$password;
        $users->save();
        Auth::login($users);
        return redirect()->route('dashboard');
    }
    public function postSignIn(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required'
        ]);
        
        if (Auth::attempt(['username'=>$request['username'], 'password'=>$request['password']])){
            return redirect()->route('dashboard');
        } else{
            return redirect()->back();
        }
    }
    
    public function logout(){
    	Auth::logout();
    	return redirect()->route('home');
    }
    
}
?>