<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller
{
    //
    public function index()
    {
        // $password = 'admin';
        // $hashedPassword = bcrypt($password);
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:5'
        ], [
            'email.required' => 'Email Tenke Priense',
            'email.email' => 'Favor Prinse Email',
            'password.required' => 'Password Tenke Priense',
            'password.min' => 'Password Minumu 5',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect('/');
        }else{
            return redirect()->route('login')->with('sala', 'Email ka Password Lalos');
        }

    }

    // ida ne atu redirect logout ba fali login
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('sala', 'Ita Boot Logout Ona');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'password' => 'required|min:5'
        ], [
            'name.required' => 'Naran Tenke Priense',
            'email.required' => 'Email Tenke Priense',
            'email.email' => 'Tenke Priense Email Nebe Mak Los',
            'email.unique' => 'Email Uja tiha Ona',
            'image.required' => 'Hili Ita Boot Nia Foto Lai',
            'image.mimes' => 'Tipu Files Tenke Imagen',
            'image.max' => 'Foto Nia Kapasita Labele Liu 2mb',
            'password' => 'Password Tenke Priense',
            'password.min' => 'Password Minimu 5'
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('userProfile'), $imageName);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['image'] = $imageName;

        User::create($data);

        return redirect()->route('login')->with('sala', 'User Registu ho Successu, Favor Login');
    }
}
