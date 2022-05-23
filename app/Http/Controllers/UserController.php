<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit() {
        $user = auth()->user();

        return view('edit', [
            'user' => $user, 
        ]);
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'firstname' => 'required|min:1|max:255',
            'lastname' => 'required|min:1|max:255',
            'email' => 'required|email|min:1|max:255',
            'password' => 'required|min:1|max:255',
        ]);

        $user = auth()->user();

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $password = $request->description;

        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->email = $email;
        $user->password = bcrypt($password);

        $user->save();

        return redirect('/');
    }
}
