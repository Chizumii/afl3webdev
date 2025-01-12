<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userListController extends Controller
{
    public function index(){
        return view('userlist', 
            [
                'AllUser' => User::all()
            ]
    );
    }
}
