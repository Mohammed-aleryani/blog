<?php

    namespace App\Http\Controllers;

    class SessionController extends Controller
    {
        public
        function destroy()
        {
            auth()->logout();
            return redirect('/')->with('success', 'Goodbye');
        }

        public
        function create()
        {
            return view('session.create');
        }


        public
        function store()
        {
            $attributes = request()->validate([
                'email'    => ['required'],
                'password' => ['required']
            ]);

            if (auth()->attempt($attributes)) {
                return redirect('/')->with('success', 'Welcome Back!');
            }

            return back()->withInput()->withErrors(['email' => 'Your provided credentials could not be verified']);
        }
    }
