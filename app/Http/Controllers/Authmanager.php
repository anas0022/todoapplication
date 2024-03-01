<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Authmanager extends Controller
{
    public function home()
    {
        $user = Auth::user();

        
        $todos = $user->todos;
    
        return view('home', compact('todos'));
    }

    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('rergistration');
    }

    public function loginpost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Retrieve the authenticated user
            $user = Auth::user();
            $todos = $user->todos;
            // Store user's name in the session
            session(['name' => $user->name]);

            return redirect()->route('home',compact('todos'))->with('success', 'You have been logged in successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function registrationpost(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'confirm' => 'required|same:password',
        ]);

        // Create user only if validation passes
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        
        // No need to hash the confirmed password, as it's not stored in the database

        // Create the user
        $user = User::create($data);

        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed");
        }

        return redirect(route('login'))->with("success", "Registration successful. You can now login.");
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

    public function welcome()
    {
        return view('welcome');
    }
}
