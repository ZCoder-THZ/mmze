<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function getUsers(User $user){

        return response()->json([
            'data'=>$user->get(),
            // 'posts'=>Post::get()
        ]);

    }
}
