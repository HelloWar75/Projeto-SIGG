<?php

namespace App\Http\Controllers;

use App\like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    public function isLiked()
    {
        $uid = Auth::user()->id;
        $liked = like::where('user_id', $uid)->count();
        $isLiked = false;

        if( $liked > 0 )
        {
            $isLiked = true;
        }

        return response()->json([
            'status' => 'success',
            'isLiked' => $isLiked
        ], 200);
    }

}
