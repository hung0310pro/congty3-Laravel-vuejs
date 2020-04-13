<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestThanhvien;
use App\User;

class ThanhVienController extends Controller
{
   protected $requests;

   public function __construct(
      \Illuminate\Http\Request $requests
   ){
      $this->requests = $requests;
   }

   public function getLogin(){
   		return view('formauthor');
   }

   public function postLogin(){
        // Auth::check() check xem đã đăng nhập hay chưa, đc dùn bên file welcome.blade

       // check(),logout(),attempt(),login()

         // đăng nhập vs model, // đăng nhập vs user có id = 2
        /* $user = User::find(2); 
         Auth::login($user); // đăng nhập vs model
         return view('welcome',['user' => Auth::user()]);*/

   		$username = $this->requests->username;
   		$password = $this->requests->password;
         // Auth::attempt check xem là tài khoản này có trong bảng users mặc định của laravel k
   		if(Auth::attempt(['name' => $username, 'password' => $password])){
            // ['user' => Auth::user()] lấy thông tin của ng đăng nhập
   			return view('myview',['user' => Auth::user()]);
   		}else{
   			return view('formauthor',['loi'=>'Đăng nhập thất bại']);
   		}
   }

   public function Logout(){
      Auth::logout();
      return view('formauthor');
   }
}
