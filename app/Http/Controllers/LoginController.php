<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request) {
        
        $request->validate([
            'user_id' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = $request->only('user_id', 'password');

        if (Auth::attempt($credentials)) {

            if(Auth::user()->status=='1') {
                if(Auth::user()->role_id=='0') {
                    return redirect('/admin/dashboard');
                }
                elseif(Auth::user()->role_id=='1') {
                    return redirect('/doctor/dashboard');
                }
                elseif(Auth::user()->role_id=='2') {
                    return redirect('/sister/dashboard');
                }
                elseif(Auth::user()->role_id=='3') {
                    return redirect('/midwife/dashboard');
                }
                elseif(Auth::user()->role_id=='4') {
                    return redirect('/baby/select');
                }
                else {
                    Session::flash('message', 'ඔබට මෙහි පිවිසීමට අවසර නොමැත !'); 
                    Session::flash('alert-class', 'alert-danger'); 
                    return redirect('/');
                }
            }
            else {
                Session::flash('message', 'ඔබට මෙහි පිවිසීමට අවසර නොමැත !'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('/?asfaf');
            }

        }
        else {
            Session::flash('message', 'ඔබ ඇතුලත් කල පරිශීලක නම හෝ මුරපදය වැරදියී !'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('/');
        }

    }
}
