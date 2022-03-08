<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PersonalAccessToken;

class TokenController extends Controller
{
    public function index($id){
        $token = PersonalAccessToken::find($id);
        return $token->tokenable_id;
    }
}
