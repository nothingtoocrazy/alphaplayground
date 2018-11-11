<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Get request to /users
     * returns all users
     */
    public function Users(){
    $users = User::all();
    echo $users;
    print_r($users);
    // return $users;
    }
}
