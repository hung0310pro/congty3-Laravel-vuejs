<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class User1Controller extends Controller
{

    protected $reportModelUser1;

    protected $modelUsers1;

    public function __construct(
    	\App\ModelUsers1 $modelUsers1,
    	\App\ReportModelUser1 $reportModelUser1
    ){
    	$this->modelUsers1 = $modelUsers1;
    	$this->reportModelUser1 = $reportModelUser1;
    }

    public function GetDanhSach(){
    	$listUser1 = $this->reportModelUser1->getListUser1();
    	return view('Templateprojecttintuc.admin.user.danhsach',['listUser1' => $listUser1]);
    }

    public function postThemDanhSach(Request $request){
        if($request->submit){
            $this->validate($request,
                [
                    'password' => 'required|min:3|max:100',
                    'repassword' => 'required|same:password'
                ],
                [
                    'password.required' => 'Xin mời bạn pass',
                    'password.min' => 'Nhập tối thiểu là 3 ký tự',
                    'password.max' => 'Nhập tối đa là 100 ký tự',
                    'repassword.required' => 'Xin mời bạn repass',
                    'password.same' => 'repass k khớp vs pass'
                ]
            );
            $password = Hash::make($request->password);
            $this->modelUsers1->setName($request->name);
            $this->modelUsers1->setEmail($request->email);
            $this->modelUsers1->setLevel($request->level);
            $this->modelUsers1->setPassword($password);
            $this->reportModelUser1->saveUser1($this->modelUsers1);
            return redirect('admin/user1/danhsach')->with('thongbao','Thêm thành công');
            
        }
    }

    public function dangnhap(){
    	return view('Templateprojecttintuc.dangnhap');
    }
    
    public function checkdangnhap(Request $request){
   		$username = $request->email;
   		$password = $request->password;
         // Auth::attempt check xem là tài khoản này có trong bảng users mặc định của laravel k
   		if(Auth::attempt(['email' => $username, 'password' => $password])){
            // ['user' => Auth::user()] lấy thông tin của ng đăng nhập
   			return redirect('admin/theloai/danhsach');
   		}else{
   			return redirect('dangnhap1')->with('loithongbao','Tài khoản không tồn tại');
   		}
    }
}
