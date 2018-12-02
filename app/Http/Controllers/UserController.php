<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function users(){
    $userModel = Users::all();
    print_r($userModel);
    foreach($userModel as $user){
        echo $user;
    }

    }
}
