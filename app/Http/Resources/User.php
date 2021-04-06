<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class User extends ResourceCollection
{
    protected $profileModel = User::class;
    private $apiToken;

    public function __construct()
    {
        // $this->middleware('jwt.auth', ['except' => ['loginMobile']]);
        $this->apiToken = uniqid(base64_encode(Str::random(60)));
    }

    public function toArray($request)
    {
        return parent::toArray($request);
    }
    public function loginMobile(Request $request)
    {

        $arr = Validator::make($request->all(), [
            'phone' => 'required',
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
        if (!Auth::guard('user_profiles')->attempt($form_login)) {
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
