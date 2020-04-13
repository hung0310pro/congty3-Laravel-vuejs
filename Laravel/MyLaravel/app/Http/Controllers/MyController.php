<?php

// php artisan make:controller namecontroller 

namespace App\Http\Controllers;

// khai báo cái này để nhận request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class MyController extends Controller
{
    public function TestMyFunction()
    {
    	return "This is my controller";
    }

    public function TestMyFunction2($param){
    	return "This is my param: ".$param;
    }

    public function TestMyFunction3(){
    	// cái này thực ra để sau khi thực hiện 1 cái gì đó thì nó sẽ request về 1 cái router khác
    	return redirect()->route('dinhdanh1');
    }

    // để check đc request hiện tại thì phải có tk Illuminate\Http\Request;
    public function TestMyFunction4(Request $request){
    	return $request->path();// trả về cái  testcallrequest (ở chỗ router)

    	// check phương thức request
/*    	if($request->isMethod('get')){
    		echo "Đây là request get";
    	}else{
    		echo "Đây kp là request get";
    	}*/

    	// check chuỗi trong phương thức
       /* if($request->is('test*')){
        	echo "Đây kp là request có chuỗi test";
        }else{
        	echo "Đây là request không có chuỗi test";
        }*/
    }

    // post form
    public function TestMyFunction5(Request $request){
    	// Nhận tất cả dữ liệu truyền lên, lưu thành dạng mảng
/*    	echo "<pre>";
		print_r($request->all());
		echo "</pre>";*/
    	// check xem có dữ liệu là username truyền lên k
    	//$request->has('username');
    	// nhận dữ liệu từ thẻ input có name là username
    	//$request->input('username');
    	// nhận dữ liệu từ mảng
    	//$request->input('username.0.name');
    	// nhận dữ liệu json dạng mảng
    	//$request->input('username.name');
    	// chỉ nhận dữ liệu có name là username
    	//$request->only('username');
    	// nhận tất trừ dữ liệu input có name là username
    	//$request->except('username');
/*    	echo "<pre>";
		print_r($request->except('username'));
		echo "</pre>";*/

		echo "<pre>";
		print_r($request->all());
		echo "</pre>";
		echo $request->username;
    }

    public function TestMyFunction6(Request $request){
        // getClientSize('myfile') get size của file tính theo byte
        // getClientMimeType('myfile') trả về dạng của file upload(image,txt...)
        // getClientOriginalName('myfile') // trả về name của file
        // getClientOriginalExtension('myfile') // trả về đuôi của file(png,jpg,pdf)
        // isValid('myfile') check xem upload có thành công hay không
    	if($request->hasFile('myfile')){
    		$file = $request->file('myfile'); // có nhiều cách lấy
    		// img là chỗ folder upload image, myimage.png là name file khi upload
    		$filename = $file->getClientOriginalName('myfile');
    		$file->move('folderupload',$filename);
    	}else{
    		echo "Chưa có file";
    	}
    }

    public function TestFunction7(){
    	$array = ['thang-10' => 'Hung','thang-09' => 'Long','thang-07' => 'Hoan','thang-03' => 'Tuan','thang-02' => 'son'];
    	$array1 = ['thang-10','thang-09','thang-07','thang-03'];
    	return response()->json($array);
    }

    public function TestFunction8(){
    	// resources -> views.
    	// nếu file này nằm trong 1 folder nữa thì sẽ là folder.namefile
    	return view('forms');
    }

    public function TestFunction9($param){
    	// resources -> views.
    	// nếu file này nằm trong 1 folder nữa thì sẽ là folder.namefile
    	return view('myview',['param' => $param]);
    }

    public function testMiddleware(){
        echo "đây là đoạn testMiddleware trong controller";
    }

    public function changeLanguage(Request $request){

        Log::info('aaaaaaaaaa');
/*        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);*/

        $lang = $request->language;
    
        $language = config('app.locale');
        if ($lang == 'en') {
            $language = 'en';
        }
        if ($lang == 'vi') {
            $language = 'vi';
        }
        \Illuminate\Support\Facades\Session::put('language', $language);
        return view('welcome');
    
    }


    public function getViewStorage(){
        return view('storageform');
    }

    public function postStorage(Request $request){
        if($request->hasFile('myfile')){
            $file = $request->file('myfile');
            $filename = $file->getClientOriginalName('myfile');
            Storage::putFileAs('photos', $request->file('myfile'), $filename);
        }else{
            echo "xin mời chọn file";
        }   
    }

    public function getFileStorage(){
        $file = Storage::get('photos/git2.txt');
        echo $file;
    }
}
