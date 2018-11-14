<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * 
     */
    public function Users(){
    $userModel = Leagues::all();
    print_r($userModel);
    foreach($userModel as $user){
        echo $user->competition_name;
    }

    }
}
