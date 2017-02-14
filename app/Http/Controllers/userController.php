<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class userController extends Controller{
    
    public function getDashboard(){
        return view('dashboard');
    }

    public function postSignUp(Request $request){
        $this->validate($request, [
            'email'=>'email|unique:users',
            'first_name'=>'require|max:120',
            'password'=>'require|min:4'
        ]);
        $email = $request['email'];
        $first_name = $request['first_name'];
        $password = bcrypt($request['password']);
        
        $user = new User();
        $user->email=$email;
        $user->first_name=$first_name;
        $user->password = $password;
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }
    
    public function postSignIn(Request $request){
        if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
            return redirect()->route('dashboard');
        } return redirect()->back();
    }
}