<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();

        if (!$user->hasRole('customers')) {
            return response()->json(['message' => 'Access denied. Only customers can log in.', "user"=>$user], 403);
        }

        $token = $user->createToken('mobile-app')->accessToken;

        return response()->json(['token' => $token, 'user' => $user]);
    }
}

?>
