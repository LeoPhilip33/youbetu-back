<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'photo' => 'required',
            'password' => ['required', 'confirmed']
        ]);
        $input = $request->all();

        $photoName;

        if ($photo = $request->file('photo')) {
            $destinationPath = 'upload/photos/';
            $photoName = date('YmdHis') . "." . $photo->getClientOriginalExtension();
            $photo->move($destinationPath, $photoName);
            
        }

        $password = Hash::make($request->password);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $photoName,
            'password' => $password
        ]);

        
        $token=$user->createToken('token-name');

        if(Auth::attempt($request->only('email','password'))){
            return response()->json([Auth::User(),200,$token->plainTextToken]);
        }
    }
}
