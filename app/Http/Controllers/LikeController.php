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

    public function Likes()
    {
        $likes = like::where('vote_type', 1)->count();
        $dlikes = like::where('vote_type', 2)->count();

        return response()->json([
            'status' => 'success',
            'likedNum' => $likes,
            'dlikedNum' => $dlikes
        ], 200);
    }

    public function do_like()
    {
        $uid = Auth::user()->id;
        $liked = like::where('user_id', $uid)->count();

        if( $liked < 1 )
        {
            //faz voto
            $like = new like();
            $like->user_id = $uid;
            $like->vote_type = 1;
            $like->save();

            return response()->json([
                'status' => 'success'
            ], 200);
        }

        return response()->json([
            'status' => 'isVoted'
        ], 200);
    }

    public function do_dlike()
    {
        $uid = Auth::user()->id;
        $liked = like::where('user_id', $uid)->count();

        if( $liked < 1 )
        {
            //faz voto
            $like = new like();
            $like->user_id = $uid;
            $like->vote_type = 2;
            $like->save();

            return response()->json([
                'status' => 'success'
            ], 200);
        }

        return response()->json([
            'status' => 'isVoted'
        ], 200);
    }

}
