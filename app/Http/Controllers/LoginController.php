<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support;
use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Validator;
class LoginController extends Controller
{
    protected $profileModel = User::class;
    private $apiToken;

    public function __construct()
    {
        // $this->middleware('jwt.auth', ['except' => ['loginMobile']]);
        $this->apiToken = uniqid(base64_encode(Str::random(60)));
    }
     public function login(Request $request)
    {

        $arr = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if($arr->fails()) {
            return [
                'success' => false,
                'code' => -1,
                'error' => $arr->errors()
            ];
        }

        $form_login = $request->all();
        if (!Auth::guard('user')->attempt($form_login)) {
            return response()->json(['error' => 'Sai tài khoản hoặc mật khẩu'], 401);
        }
        $profile = UserProfile::where('phone', $request->phone)->first();
        return $this->respondWithToken($profile, $this->apiToken);
    }
     protected function respondWithToken($profile, $token)
    {
        return response()->json([
            'user' => $profile,
            'access_token' => $token,
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
