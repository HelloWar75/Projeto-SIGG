<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function register(Request $request)
    {
        /* Validar dados */
        $validation = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        if ( $validation->fails() )
        {
            /*
                Retorna código de erro 422 ( Unprocessable Entity ) e juntamente os erros.
            */
            return response()->json([
                'status' => 'error',
                'errors' => $validation->errors()
            ], 422);

        }

        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'status' => 'success'
        ], 200);

    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if ( $token = $this->guard()->attempt($credentials) ) {
            return response()->json([
                'status' => 'success'
            ], 200)->header('Authorization', $token);
        }

        return response()->json([
            'error' => 'login_error'
        ], 401);
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json([
            'status' => 'success',
            'msg' => 'Deslogado com successo!'
        ], 200);
    }

    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ], 200);
    }

    public function refresh()
    {
        if ( $token = $this->guard()->refresh() )
        {
            return response()->json([
                'status' => 'success'
            ], 200)->header('Authorization', $token);
        }

        return response()->json([
            'error' => 'refresh_token_error'
        ], 401);
    }

    private function guard()
    {
        return Auth::guard();
    }
}
