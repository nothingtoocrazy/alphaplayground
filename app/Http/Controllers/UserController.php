<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function user(){
    $userModel = User::all();
    print_r($userModel);
    foreach($userModel as $user){
        echo $user;
    }

    }
}
