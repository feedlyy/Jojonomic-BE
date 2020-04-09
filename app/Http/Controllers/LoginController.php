<?php


namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{

    public function generateToken ($length = 32)
    {
        $char = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLen = strlen($char);

        $getToken = '';
        for ($i = 0; $i < $length; $i++) {
            $getToken .= $char[rand(0, $charLen - 1)];
        }

        return $getToken;
    }

    public function login (Request $request)
    {
        $request = $request->all();
        $rules = [ //validation input
            'email' => 'required|email',
            'password' => 'required'
        ];

        $validate = Validator::make($request, $rules);
        if ($validate->fails()) {
            return response()->json($validate->failed(), 422);
        }

        $user = User::query()->where('email', $request)->first();
//        check if data is correct
        if (! $user || ! Hash::check($request['password'], $user->password)) {
            return response()->json(['Error' => 'Email or Password not correct '], 404);
        }

        Auth::user();
        $getToken = $this->generateToken();
        $token = User::query()->select('id')
            ->where('email', $request['email'])->first();
        $token->token = $getToken;
        $token->save();
        return response()->json(['success' => $token], 200);
    }

    public function logout ()
    {
        if (Auth::check()) {
            $user = User::query()->where('token', Auth::user()->token)
                ->first();
            $user->token = '';
            $user->save();
            return response()->json(['Success' => 'Logout Success'], 200);
        } else {
            return response()->json(['Error' => 'Something went wrong'], 422);
        }
    }
}
