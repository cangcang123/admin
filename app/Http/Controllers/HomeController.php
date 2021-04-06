<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   public function register(){
   	return view('ApiAuth.FromRegister');
   }
   public function create(Request $request){
   	// $request->validate([
    //         'full_name' => 'required',
    //         'phone' => 'required|unique:User,username',
    //         'pass' => 'required|min:6|max:20',
    //         'adress' => 'required'

    //     ],
    //     [
    //         'full_name.required' => 'Vui Lòng Không Để Trống họ tên',
    //         'phone.unique' => 'Tài Khoản Đã có Người Đăng Ký',
    //         'passa.required' => 'Vui Lòng Không Để Trống Mật Khẩu',
    //         'passa.min' => ' Mật Khẩu Ít Nhất 6 ký tự',
    //         'passa.max' => 'mật khẩu đã quá 20 ký tự',
    //         'phone.required' => 'Vui Lòng Không Để Trống số điện thoại',
    //         'adress.required' => 'Vui Lòng Không Để Trống địa chỉ',
    //     ]);
   	 	$password = bcrypt($request->pass);
   	 	$array = [
   	 		'full_name'=>$request->full_name,
   	 		'username'=>$request->phone,
   	 		'email'=>$request->mail,
   	 		'phone'=>$request->phone,
   	 		'id_pay'=>'',
   	 		'referral_code'=>'',
   	 		'wallet'=>0,
   	 		'active'=>1,
   	 		'adgroup'=>1,
   	 		'gender'=>$request->gender,
   	 		'max_invite'=>20,
   	 		'adress'=>$request->adress,
   	 		'password'=>$password,
   	 	];
   	 	$test =  User::create($array);
   	 	dd($test);
   	 	return view('test',compact('test'));
   }
   public function login(Request $request , User $user){
    return view('test');
    die();
   	// $array = [
    //         'username' => $request->user,
    //         'password' => $request->pass,
    //     ];
        $form_login = $request->all();
        if (!Auth::guard('user')->attempt($form_login)) {
            return response()->json(['error' => 'Sai tài khoản hoặc mật khẩu'], 401);
        }
        $profile = UserProfile::where('phone', $request->phone)->first();
        return $this->respondWithToken($profile, $this->apiToken);
    }

   
}
