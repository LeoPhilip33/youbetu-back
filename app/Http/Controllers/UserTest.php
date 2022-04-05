<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserTest extends Controller
{
    public function index(){
        $users = User::all();
        return $users;
    }

    public function getId($id){
        $userId = User::find($id);
        return $userId;
    }
    
}
