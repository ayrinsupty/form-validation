<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\ValidatedData;

class FormController extends Controller
{
    public function create()
    {
        return view('createUser');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required | min:5',
            'email' => 'required | email | unique:users'
        ], [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required',
            'email.email' => 'Email field must be email address.'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);

        return back()->with('success', 'User Created Successfully!');
    }
}
