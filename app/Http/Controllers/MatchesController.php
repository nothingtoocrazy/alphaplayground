<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatchesController extends Controller
{
    // public function users(){
    // $userModel = Users::all();
    // print_r($userModel);
    // foreach($userModel as $user){
    //     echo $user;
    // }
    
    public function matches() {
        // $dummyMatches = new \stdClass();
        // $dummyMatches->matches = [];
        $dummyMatches = [];
        $match = new \stdClass();
        $match->title = "Tottenham vs. Arsenal";
        $match->score = "1-0";
        $dummyMatches[] = $match;
        $match = new \stdClass();
        $match->title = "Liverpool vs. Everton";
        $match->score = "1-4";
        $dummyMatches[] = $match;
       
        
        
        return json_encode($dummyMatches);
        //"it worked";
    }
    
}


