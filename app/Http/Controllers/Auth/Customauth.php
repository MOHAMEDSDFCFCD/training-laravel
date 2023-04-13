<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Customauth extends Controller
{
    public function adult(){
        return view(view:'customauth.index');
    }
    public function site(){
        return view(view:'site') ;
    }
    public function admin(){
        return view(view:'admin');
    }
    public function adminlogin(){
        return view(view:'auth.adminlogin');

    }
    public function checkadminlogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    

    }
}
