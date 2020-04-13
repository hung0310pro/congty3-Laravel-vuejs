<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test',function(){
	return "test my laravel";
});

Route::get('test1/test2', function(){
	echo "<h1> Vui lòng dùng laravel </h1>";
});

// Truyền tham số trên route

Route::get('testparam/{param}', function($param){
	return "This is my param : ".$param;
});

Route::get('testparam/{param}/{param2}', function($param,$param2){
	return "This is my param : ".$param.$param2;
});

Route::get('thamsoten/{name}', function($name){
	return "This is my name with condition is word: ".$name;
})->where(['name' => '[a-zA-Z]+']);

// Cách định danh 1 route, để có thể call route đó trong 1 function nào khác
// C1
Route::get('routedn1',['as'=>'dinhdanh1',function(){
	return "This is my dinh danh 1";
}]);
// C2
Route::get('routedn2',function(){
	return "This is my dinh danh 2";
})->name("dinhdanh2");
// call đến 1 trong 2 tk định danh ở trên
Route::get('calldinhdanh',function(){
	return redirect()->route('dinhdanh2');
});


// Group in laravel
Route::group(['prefix' => 'Mygroup'],function(){
	Route::get('User1',function(){
		echo "User1";
	});
	Route::get('User2',function(){
		echo "User2";
	});
	Route::get('User3',function(){
		echo "User3";
	});
});

// php artisan make:controller namecontroller 
// Call 1 controller, bên vế thứ 2 là name controller vs name function.
Route::get('testfirstcontroller','MyController@TestMyFunction');

Route::get('testcontroller2/{param}','MyController@TestMyFunction2');
// call định danh trong 1 function controller
Route::get('testcontroller3','MyController@TestMyFunction3');

//Check request and respon
// - call request currently, check phương thức request hiện tại là post hay get, check trong chuỗi request có chữ bất kỳ nào đó hay k? ví dụ như là user,admin...
Route::get('testcallrequest','MyController@TestMyFunction4');

// call to a template
Route::get('callform',function(){
	return view('forms');
});
// get info được post từ form trong file forms.blade, ngoài ra còn 1 số thể loại nhận tham số
// postform1 : định danh được gọi trong form template, hàm của controller
Route::post('postform',['as'=>'postform1','uses' => 'MyController@TestMyFunction5']);

// call to a template upload
Route::get('callformupload',function(){
	return view('formupload');
});
// Upload file sẽ vào các folder custom ở trong public
Route::post('postformupload',['as'=>'postformupload1','uses' => 'MyController@TestMyFunction6']);

// send request và trả về respon dạng json
Route::get('getJson','MyController@TestFunction7');

// call 1 template trong controller
Route::get('getTemplate','MyController@TestFunction8');

// Truyền tham số từ controller sang 1 file template
Route::get('truyenparam/{param}','MyController@TestFunction9');

/*View::share('title_allview','Học lập trình laravel');*/ // chỉ cần echo cái biến $title_allview thì
// ở trang view nào thì sẽ lấy đc giá trị của nó.
// 
// nếu chỉ muốn share biến cho 1 vài trang cần truyền thì làm như sau
/*View::composer('b22',function($view){
  return $view->with('bien1',"Đây là biến 1");
});*/

// nếu truyền sang nhiều view thì làm như sau, cho mấy cái view vào trong 1 mảng
/*View::composer(['b22','b23'],function($view){
  return $view->with('bien1',"Đây là biến 1");
}); */  // ví dụ trong file này namespace App\Providers\AppServiceProvider;


// tìm hiểu về template
Route::get('calltemplatecha',function(){
	return view('templacechacon.viewcha');
});

Route::get('calltemplatecon',function(){
	return view('templacechacon.viewcon');
});

// cách truyền biến sang 1 template vs compact
Route::get('calltemplatecon1/{bien}',function($bien){
	return view('templacechacon.viewcon',compact('bien'));
});

// cách truyền biến sang 1 template vs mảng bt
Route::get('calltemplatecon2/{bien}',function($bien){
	return view('templacechacon.viewcon',['bien' => $bien]);
});



// Bài học về database
Route::get('createtable1',function(){
	Schema::create('SanPham',function($table){
		$table->increments('id');
		$table->string('namesanpham',200);
		$table->integer('gia');
		$table->timestamps();
	});
    echo "Tạo bảng thành công";
});

//+ Tạo bảng khóa phụ liên kết với khóa chính của bảng sản phẩm
//- mặc định số lượng ban đầu  = 0
//- cho nó phải giống như khóa chính của bảng SanPham $table->integer('idsanpham')->unsigned(); 
//- khóa phụ idsanpham liên kết tới khóa chính của bảng SanPham $table->integer('idsanpham')->references->('id')->on('SanPham');

/*$table->unique(['user_id','role_id']);
$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')*/;
Route::get('createtable2',function(){
	Schema::create('Sanpham2',function($table){
		$table->increments('id');
		$table->string('namesanpham2',200);
		$table->float('gia');
		$table->integer('soluong')->default(0);  
		$table->integer('idsanpham')->unsigned(); 
		$table->foreign('idsanpham')->references('id')->on('SanPham'); 
	});
	echo "Tạo bảng thành công";
});

Route::get('createtable3',function(){
	Schema::create('Sanpham3',function($table){
        $table->increments('id');
        $table->string('email',200);
        $table->string('sku');
        $table->unsignedInteger('id_product')->index();
        $table->foreign('id_product')->references('id')->on('sanphammigrate');
        $table->timestamps();
	});
	echo "Tạo bảng thành công";
});

//+ sửa các bảng đã tạo, xóa cột giá của bảng SanPham(sửa thì sẽ lầ table, còn tạo là create)
Route::get('suatable',function(){
	Schema::table('SanPham',function($table){
		$table->dropColumn('gia');
	});
});
//+ sửa bảng SanPham là thêm cột email
Route::get('suatable1',function(){
	Schema::table('SanPham',function($table){
		$table->string('email');
	});
});

// update change name
/*$table->renameColumn('from', 'to');*/

// php artisan make:migration SanPham_Migrate tạo bảng này vs lệnh. sau đó check trong chỗ database/migrations sẽ có file ms tạo, rồi vào đó tạo.
// php artisan migrate
// php artisan migrate:rollback (hủy bỏ việc thực thi migration trước đó)
// php artisan migrate:reset (hủy bỏ tất cả những cái migration đã thực hiện)
// ngoài ra còn php artisan make:migration nametable --create=nametable or  --table=nametable

// + Tạo dữ liệu insert bằng seeds (database/seeds/DatabaseSeeder.php)

// Truy vấn dữ liệu vs query builder
Route::get('query/sanphammigrate',function(){
	$data = DB::table('sanphammigrate')->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}); 

Route::get('getsanphamid',function(){
	$data = DB::table('sanphammigrate')->where('id',1)->get();
	/*where('id',>,1) ...*/
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('getsanphamin',function(){
	$data = DB::table('sanphammigrate')->wherein('id',[1,2])->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('getsanphambetween',function(){
	$data = DB::table('sanphammigrate')->wherebetween('id',[1,3])->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('getsanphamlimit',function(){
	$data = DB::table('sanphammigrate')->skip(0)->take(2)->get(); 
	/*(0,2)*/
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('select_orwhere', function(){
	$data = DB::table('sanphammigrate')->where('id',1)->orwhere('id',3)->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('select_andwhere', function(){
	$data = DB::table('sanphammigrate')->where('id',1)->where('id','product1')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('select_tanggiam', function(){
	$data = DB::table('sanphammigrate')->orderby('id','desc')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('select_test', function(){
	$data = DB::table('sanphammigrate')->pluck('nameproduct')->all();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/count', function(){
	$data = DB::table('sanphammigrate')->where('nameproduct','product2')->count();
	/*->select(DB::raw('count(*) as count'))*/
	echo "số dòng là : ".$data;
});

Route::get('query/trungbinh', function(){
	$data = DB::table('sanphammigrate')->avg('id');
	echo "Tổng trung bình là : ".(int)$data;
});

Route::get('query/join', function(){
	$data = DB::table('sanphammigrate')->leftjoin('sanpham2','sanphammigrate.id','=','sanpham2.id_product')->get();
	//$data = DB::table('bangcha1')->select('name','price','diachi')->join('bangcon1','bangcon1.bangcha1_id','=','bangcha1.id')->get();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('query/insert_1_record', function(){
	$data = DB::table('sanpham2')->insert([
		"email" => "hung0201pro@gmail.com",
		"sku" => '123',
		"id_product" => '1'
	]);
});

Route::get('query/insert_nhieu_record', function(){
	$data = DB::table('sanpham2')->insert([
		["email" => "hung02011996pro@gmail.com","sku" => "231","id_product" => 1],
		["email" => "hung02011669pro@gmail.com", "sku" => "996","id_product" => 1],
		["email" => "hung111pro@gmail.com", "sku" => "99699","id_product" => 3],
		["email" => "hung222pro@gmail.com", "sku" => "996221","id_product" => 4],
	]);
});

// lấy id insert mới nhất lastinsert id ấy
/*Route::get('query/getid_new', function(){
	$id_new = DB::table('bangcha1')->insertGetId([
		"name" => "Lê Mạnh Hùng123",
		"diachi" => "Hà Nội",
	]);

	echo $id_new;
});
*/
/*Route::get("query/update_bangcha", function(){
	 DB::table('bangcha1')->where('id',3)->update(['name' => 'Lê Hùng 96','diachi' => 'Việt Nam']);
});*/

// xóa hết vs xóa theo điều kiện vs query builder
/*DB::table('users')->delete();

DB::table('users')->where('votes', '>', 100)->delete();*/

// model

Route::get('model/sanphammigrate',function(){
	// last,first
	$data = App\modelTest::all()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});


Route::get('model/sanphammigratefind',function(){
	/*findOrFail(1) cái này là nếu k tìm thấy thì show ra lỗi*/
	$data = App\modelTest::find(1)->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

Route::get('model/sanpham2',function(){
	/*findOrFail(1) cái này là nếu k tìm thấy thì show ra lỗi*/
	$data = App\sanpham2::/*select('email','sku')->*/where('email','hung0201pro@gmail.com')->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
// thêm select nếu chỉ muốn lấy email vs sku, or bất kỳ cột nào chỉ muốn lấy
});

Route::get('model/sanpham2_whereRaw', function(){
	$data = App\sanpham2::whereRaw('email = ? or sku = ?',['hung0201pro@gmail.com','99699'])->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";

    // cách in sql query vs model và query builder
	/*$data1 = App\sanpham2::whereRaw('email = ? or sku = ?',['hung0201pro@gmail.com','99699'])->toSql();
	echo "<pre>";
	print_r($data1);
	echo "</pre>";*/
});

//->toSql() in sql ra trong model vs query builder

Route::get('model/sanpham2_delete',function(){
	// xóa dữ liệu của bảng sanpham2
	$data = App\sanpham2::destroy(2);
});
// oneMany
// select * from sanpham2 where id_product = 1.
Route::get('model/modelTestonemany',function(){
	$data = App\modelTest::find(1)->sanpham2onemany()->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
});

// many many
// lấy đc cả id của Color tương ứng vs car
Route::get('model/modelCar',function(){
	$data = App\Car::find(1)->manycarmanycolor()->wherePivot('color_id', 1)->get()->toArray();
	/*App\Car::find(1)->manycarmanycolor()->wherePivot('color_id', 1)->get()->toArray();*/
	/*App\Car::find(1)->manycarmanycolor()->wherePivotIn('color_id', [1, 2])->get()->toArray();*/
	$data1 = App\Car::find(1)->manycarmanycolor()->toSql();
	/*echo "<pre>";
	print_r($data1);
	echo "</pre>";*/

	echo "<pre>";
	print_r($data);
	echo "</pre>";

/*	Array
(
    [0] => Array
        (
            [id] => 1
            [namecolor] => red
            [created_at] => 
            [updated_at] => 
            [pivot] => Array
                (
                    [car_id] => 1
                    [color_id] => 1
                )

        )

    [1] => Array
        (
            [id] => 2
            [namecolor] => black
            [created_at] => 
            [updated_at] => 
            [pivot] => Array
                (
                    [car_id] => 1
                    [color_id] => 2
                )

        )

)*/
});

//(1) (modelColortestjoin)
Route::get('model/modelColortestjoin',function(){
	$data = App\Color::where('Color.id','1')->leftjoin('CarColor','Color.id','=','CarColor.color_id')->join('Car','CarColor.car_id','=','Car.id')->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
/*	Array
(
    [0] => Array
        (
            [id] => 1
            [name] => car1
            [created_at] => 
            [updated_at] => 
            [car_id] => 1
            [color_id] => 1
            [price] => 300
        )

    [1] => Array
        (
            [id] => 3
            [name] => car3
            [created_at] => 
            [updated_at] => 
            [car_id] => 3
            [color_id] => 1
            [price] => 100
        )

    [2] => Array
        (
            [id] => 2
            [name] => car2
            [created_at] => 
            [updated_at] => 
            [car_id] => 2
            [color_id] => 1
            [price] => 200
        )

)*/
});

// many many, cái này là dạng của (1) (modelColortestjoin)
Route::get('model/modelColor',function(){
	$data = App\Color::find(1)->manycolormanycar()->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";

/*	Array
(
    [0] => Array
        (
            [id] => 1
            [name] => car1
            [price] => 300
            [created_at] => 
            [updated_at] => 
            [pivot] => Array
                (
                    [color_id] => 1
                    [car_id] => 1
                )

        )

    [1] => Array
        (
            [id] => 3
            [name] => car3
            [price] => 100
            [created_at] => 
            [updated_at] => 
            [pivot] => Array
                (
                    [color_id] => 1
                    [car_id] => 3
                )

        )

    [2] => Array
        (
            [id] => 2
            [name] => car2
            [price] => 200
            [created_at] => 
            [updated_at] => 
            [pivot] => Array
                (
                    [color_id] => 1
                    [car_id] => 2
                )

        )

)*/
});


// Response trả về dạng json trong Laravel
Route::get('response/responsejson',function(){
	$array = ['name' => 'Hung','email' => 'hung0201pro@gmail.com','nick' => 'Lê Hùng 96'];
	return Response::json($array);
});

// + Response redirect in Laravel
Route::get('response/responseredirect',function(){
	// Route::get('routedn1',['as'=>'dinhdanh1',function()
	// or redirect()->route('dinhdanh1');
	// redirect()->back(); (cái này kiểu sang trang đó rồi lại redirect về trang cũ trước đó, ví dụ đang ở trang a, và chạy route nó sẽ sang trang b rồi trả về trang a.)
	return redirect('response/responsejson');
});

// + response download

Route::get('response/download',function(){
	$url = '../public/download/zzzzzzzzzz.txt.rar';
	// ngoài ra còn có download xong xóa. Response::download($url)->deleteFileAfterSend(true)
	return Response::download($url);
});

// Author (model : thanhvien, controller : ThanhVienController, request : RequestThanhvien(check điền form), template: formauthor.blade.php, ngoài ra còn thanhvien.migrate..)
Route::get('author/getform',['as' => 'formauthor','uses' => 'ThanhVienController@getLogin']);
Route::post('author/postform',['as'=>'postformauthor','uses' => 'ThanhVienController@postLogin']);
Route::get('logout',['as' => 'logout','uses' => 'ThanhVienController@Logout']);
/* function check login tham khảo
public function postlogin(LoginRequest $chiso)
	{
		$fullname = $chiso['fullname'];
		$password1 = $chiso['password1'];
		$login = DangkyModel::whereRaw('fullname = ? and password = ?', [$fullname, $password1])->get()->toArray();
		if (isset($login) && !empty($login)) {
			Session()->put('logindn', $fullname);
			return redirect()->route('listuser')->with('dangnhap', 'Đăng nhập thành công');
		} else {
			return redirect()->back()->with('dangnhaptach', 'Đăng nhập thất bại');
		}
	}
*/

// Session
// phải đặt session trong middleware
Route::group(['middleware' => ['web']],function(){
	Route::get('Session',function(){

		Session::put('Session1','Lê Hùng'); // tạo session

		echo Session::get('Session1'); // get value Session

	   //Session::forget('Session1'); // xóa 1 session vs name tương ứng

       // Session::flush(); // xóa hết session

	  	// Session::flash('mess','Hello')	cái này chỉ có 1 lần đầu tiên khi vào 1 route, lần sau khi f5 lại trang sẽ bị mất. (thử vs tk Session/flash)

		if(Session::has('Session1')) // kiểm tra có hay chưa session
			echo "Đã có Session là Session1";
		else
			echo "Chưa có Session";
	});

	/*Route::get('Session/flash',function(){
		echo Session::get('mess');
	});*/
});


// restfull controler

Route::resource('hocsinh','HocSinhController');


// Thử làm 1 project nhỏ

/*view()->share('user1',Auth::user()); ở cái Controller default là để mặc định nếu đăng nhâp
thì mình có thể lấy info của ng đăng nhập, viết vào đó vì nó đc kế thừa bởi các controller con
Nhưng hiện tại đang k check đc đăng nhập(maybe lỗi);
*/

Route::get('dangnhap1','User1Controller@dangnhap');
Route::post('dangnhap1',['as'=>'dangnhap','uses' => 'User1Controller@checkdangnhap']);

// Bảo mật vs middleware : php artisan make:middleware AdminLogginMiddleware
//adminLoginMiddleware cái này là kiểu check login hay chưa, nếu rồi thì cho vào chỗ
// admin còn không thì sẽ đưa về trang đăng nhập.
// App\Http\Middleware\AdminLogginMiddleware, và biến routeMiddleware(adminLoginMiddleware) trong App\Http\Kernel
Route::group(['prefix' => 'admin','middleware' => 'adminLoginMiddleware'],function(){
	Route::group(['prefix' => 'theloai'],function(){
		Route::get('danhsach','TheLoaiController@GetDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSuaDanhSach');
		Route::post('sua/{id}','TheLoaiController@postSuaDanhSach');

		Route::get('them','TheLoaiController@getThemDanhSach');
		Route::post('them',['as'=>'themtheloai','uses' => 'TheLoaiController@postThemDanhSach']);

		Route::get('xoa/{id}','TheLoaiController@xoaTheLoaiDanhSach');
	});

    Route::group(['prefix' => 'loaitin'],function(){
		Route::get('danhsach','LoaiTinController@GetDanhSach');

		Route::get('sua/{id}','LoaiTinController@getSuaDanhSach');
		Route::post('sua/{id}','LoaiTinController@postSuaDanhSach');

		Route::get('them','LoaiTinController@getThemDanhSach');
		Route::post('them',['as'=>'themloaitin','uses' => 'LoaiTinController@postThemDanhSach']);

		Route::get('xoa/{id}','LoaiTinController@xoaTinTucDanhSach');
	});

	Route::group(['prefix' => 'tintuc'],function(){
		Route::get('danhsach','TinTucController@GetDanhSach'); // order by ReportModelTinTuc
		// get theloai dang text trong danhsach.blade.php, get image

		Route::get('sua/{id}','TinTucController@getSuaDanhSach');

		Route::get('them','TinTucController@getThemDanhSach');// sửa dụng ajax
		Route::post('them',['as'=>'themtintuc','uses' => 'TinTucController@postThemDanhSach']);

		Route::post('getajaxloaitin','TinTucController@getAjaxLoaiTin');
	});


	Route::group(['prefix' => 'user1'],function(){
		Route::get('danhsach','User1Controller@GetDanhSach');
		Route::post('danhsach',['as'=>'themuser','uses' => 'User1Controller@postThemDanhSach']);
	});
});


//*** Laravel Nâng cao

//+++ Method hay Property (xem chi tiết tại views/admin/tintuc/sua)?

// nếu như trang chỉ cần hiện số  lượng cmt mà k cần quan tâm tới nội dung thì dùng tk 2, còn nếu mà nó cần quan tâm tới nội dung thì dùng tk 1. Tuy nhiên tk 2 mà thêm get() thì nội dung in ra sẽ như tk 1

// $tinTuc->TintuchasManyComment()->get(); giống $tinTuc->TintuchasManyComment. in ra tất cả nội dung

/*echo "<pre>";
print_r($tinTuc->TintuchasManyComment->count()); // (1)
echo "</pre>";

echo "<pre>";
print_r($tinTuc->TintuchasManyComment()->count()); // (2)
echo "</pre>"*/


//*** Truy vấn dữ liệu trong Eloquent Relationship
// lấy ra các bài post có ít nhất 1 comment, hoặc các bài post có số cmt bài post >= 3
/*
$posts = App\Post::has('comments')->get();
$posts = Post::has('comments', '>=', 3)->get();

*/

// Ngoài ra còn có whereHas() và orWhereHas()

/*
$posts = Post::whereHas('comments', function ($query) {
    $query->where('content', 'like', 'foo%');
})->get();
*/

// Trái ngược với phương thức has(), whereHas(), orWhereHas() Eloquent cung cấp phương thức doesntHave(), whereDoesntHave()

/*
$posts = App\Post::doesntHave('comments')->get();

$posts = Post::whereDoesntHave('comments', function ($query) {
    $query->where('content', 'like', 'foo%');
})->get();
*/

// ngoài ra còn có withCount, theloaihasManyLoaitin : cai nay la ham quan he trong ModelTheloai
// cai nay no dem duoc so luong loai tin cua moi the loai, vi du TheLoai1 co 2 loai tin
// http://prntscr.com/rogkkp
Route::get('model/modelwithcount',function(){
	$data = App\ModelTheloai::withCount('theloaihasManyLoaitin')->get()->toArray();
	echo "<pre>";
	print_r($data);
	echo "</pre>";
	/*foreach ($data as $area) {
	 	echo "<pre>";
		print_r($area->theloaihas_many_loaitin_count);
		echo "</pre>";
	}*/
});

// Thậm chí, có thể thực hiện đếm kết quả cho nhiều các quan hệ khác nhau:

/*
$posts = Post::withCount(['votes', 'comments' => function ($query) {
    $query->where('content', 'like', 'foo%');
}])->get();

echo $posts[0]->votes_count;
echo $posts[0]->comments_count;
*/
// và có thể đặt tên cho các cột đếm kết quả trả về:

/*
$posts = Post::withCount([
    'comments',
    'comments AS pending_comments' => function ($query) {
        $query->where('approved', false);
    }
])->get();

echo $posts[0]->comments_count;

echo $posts[0]->pending_comments_count;
*/

//*** Xử lý tải dữ liệu từ cơ sở dữ liệu lên Model

//+++ Lazy load
/*
Đoạn code này hoạt động như sau, đầu tiên nó sẽ thực hiện một truy vấn lấy ra tất cả các cuốn sách, tiếp theo nó thực hiện một vòng lặp với mỗi cuốn sách nó sẽ truy xuất đến tác giả của cuốn sách.Với lazy load, nếu có 10 cuốn sách, đoạn code trên sẽ thực hiện 11 truy vấn bao gồm 1 truy vấn lấy tất cả cuốn sahcs sách và 10 truy vấn lấy thông tin về tác giả tương ứng vs 10 cuốn sách.*/

/*class Book extends Model
{
    
    Lấy thông tin tác giả, người viết cuốn sách này
     
    public function author()
    {
        return $this->belongsTo('App\Author');
    }
}
Để lấy thông tin tất cả các cuốn sách và các tác giả của chúng, sử dụng đoạn code sau:

$books = App\Book::all();

foreach ($books as $book) {
    echo $book->author->name;
}*/

//+++ Eager load, tải dữ liệu một lần

/*$books = App\Book::with('author')->get();

foreach ($books as $book) {
    echo $book->author->name;
}
nó thực hiện như sau ở database:

select * from books
select * from authors where id in (1, 2, 3, 4, 5, ...)*/

/*--- Thêm ràng buộc truy vấn trong kiểu tải dữ liệu eager load*/

/*$books = App\Book::with(['author' => function ($query) {
    $query->where('age', '>', 40);
}])->get();*/

// +-+ Chốt lại cả 2 tk trên :

/*Mỗi phương thức tải có những ưu nhược điểm riêng tùy thuộc từng tình huống để sử dụng, với các truy vấn dữ liệu để "THỰC HIỆN TÍNH TOÁN TỔNG HỢP", "DỮ LIỆU CẦN TẢI NGAY 1 LẦN" chúng ta nên sử dụng eager load, còn với "các truy vấn dữ liệu thực hiện từng phần một" thì lazy load là một lựa chọn không tồi*/


// ++++ Eager loading với phương thức load()
/*$books = App\Book::all()->load('author'); Chúng ta nhận được câu truy vấn thực thi tương tự như sử dụng with()

select * from books
select * from authors where id in (1, 2, 3, 4, 5, ...)*/

// ví dụ về Eager loading với phương thức with(), Eager loading với phương thức load()
// con tới cha
Route::get('model/modelwithEager',function(){
	$data = App\ModelLoaitin::with('LoaiTinHasOneTheLoai')->get();
	
	foreach ($data as $value) {
	 	echo "<pre>";
		print_r($value->LoaiTinHasOneTheLoai->ten);
		echo "</pre>";
	}
});

// cha tới con
Route::get('model/modelwithEager1',function(){
	$data = App\ModelTheloai::with('theloaihasManyLoaitin')->get();
	
	foreach ($data as $value) {
	 	foreach ($value->theloaihasManyLoaitin as $val) {
 			 	echo "<pre>";
				print_r($val->ten);
				echo "</pre>";
	 	}
	}
});


Route::get('model/modelloadEager',function(){
	$data = App\ModelLoaitin::all()->load('LoaiTinHasOneTheLoai');
	
	foreach ($data as $value) {
	 	echo "<pre>";
		print_r($value->LoaiTinHasOneTheLoai);
		echo "</pre>";
	}
});


// *** 1 vài truy vấn hay : https://viblo.asia/p/mot-so-truy-van-huu-ich-trong-laravel-3P0lPA185ox
// có cả condition, where...

// *** tối ưu hóa orm để giảm mức tiêu thụ bộ nhớ 
// https://viblo.asia/p/toi-uu-hoa-cac-truy-van-eloquent-de-giam-muc-tieu-thu-bo-nho-4P856Pr1ZY3





/*$post = Post::findOrFail($id, ['id', 'title', 'content']);
Tìm kiếm một bài post sử dụng where

$post = Post::where('id', $id)->first(['id', 'title', 'content']);*/

/*Sử dụng mệnh đề Where bạn có thể tìm kiếm nhiều bài viết với phương thức Get, "nó sẽ trả về một tập hợp CÁC object", "trong khi các phương thức First và Find trở thành một object."*/


/*DB::table('users')
          ->whereExists(function ($query) {
              $query->select(DB::raw(1))
                    ->from('orders')
                    ->whereRaw('orders.user_id = users.id');
          })
          ->get();
Truy vấn trên sẽ sinh ra đoạn SQL sau:

select * from users
where exists (
 select 1 from orders where orders.user_id = users.id
)*/

// +++ test middleware

Route::get('/middlewaretest',[
   'uses' => 'MyController@testMiddleware',
   'middleware' => 'testMiddleware:superadmin',
]);


// +++ localization (dùng .php tuy nhiên có thể dùng json, bt thì hay dùng json hơn)
// ++ tham khảo : https://viblo.asia/p/localization-in-laravel-oOVlYG3BK8W
Route::get('/aaa/{language}', function ($language) {
	App::setLocale($language);
    return view('welcome');
});

/*Route::get('change-language/{language}', 'MyController@changeLanguage')->name('change-language');*/// các file chú ý (welcome.blade.php, MyController.php, Localization.php(middleware))

Route::group(['middleware' => 'localization'], function () {
    Route::get('change-language/{language}', 'MyController@changeLanguage');
});

// +++ check log ở MyController@changeLanguage file(storage/logs/laravel.log)
// Tất cả các exception được quản lý bởi class app\Exceptions\Handler class này chứa hai phương thức là report và render.

// + Phương thức "REPORT" được sử dụng để log exception và gửi chúng đến các dịch vụ ngoài như Bugsnag hoặc Sentry. Mặc định, phương thức report chỉ đơn giản truyền exception đến class nơi exception xảy ra. Ví dụ, nếu bạn cần báo cáo các dạng khác nhau của exception theo cách khác, bạn có thể sử dụng toán tử so sánh của PHP là instanceof:

// + Phương thức "RENDER" Phương thức này được sử dụng cho mục đích điều hướng, với mỗi exception cụ thể bạn muốn điều hướng người dùng đến một trang HTTP. Mặc định, exception được truyền đến base class nơi sinh ra response, tuy nhiên bạn hoàn toàn có thể kiểm tra dạng exception và trả về một response tùy ý:

// 1 ví dụ App\Exceptions\Handler

Route::get('/theloai/{id}', function($id) {
    $user = App\ModelTheloai::findOrFail($id);
	echo "<pre>";
	print_r($user->toArray());
	echo "</pre>";
});

// tham khảo (https://allaravel.com/blog/quan-ly-loi-va-ghi-log-trong-ung-dung-laravel)


// +++ Helper trong laravel : cung cấp những hàm được sử dụng global trong laravel, dùng để hỗ trợ cho ng sử dụng.
// https://viblo.asia/p/tu-tao-helpers-trong-laravel-RQqKLwGb57z
// https://viblo.asia/p/helpers-trong-laravel-53-RQqKLgrr57z


// +++ cache https://viblo.asia/p/laravel-57-tim-hieu-ve-cache-1VgZvo9rlAw


// +++ File Storage của Laravel(https://viblo.asia/p/tim-hieu-ve-file-storage-cua-laravel-gGJ59jBpKX2,  https://viblo.asia/p/filesystem-cloud-storage-trong-laravel-53-QpmleLbVZrd)

// ++ Laravel cung cấp cho người dùng một giải pháp để "quản lý file" cực kỳ tiện lợi và hữu ích - đó là File Storage. Với File Storage bạn có thể thao tác với các file ở local, Rackspace Cloud Storage và cả Amazon S3.

// test upload vs file dạng Storage
Route::get('testviewstorage','MyController@getViewStorage');

Route::post('storageupload',['as'=>'storageupload','uses' => 'MyController@postStorage']);
// get 1 file ở  Storage
Route::get('testgetstorage','MyController@getFileStorage');


// +++ API Resources
// https://viblo.asia/p/eloquent-api-resources-gAm5yo4LZdb
// ++ Khi chúng ta xây dựng một API, chúng ta có thể cần phải có "Một lớp CHUYỂN ĐỔI nằm giữa" các Eloquent models và JSON responses để trả về cho người dùng. Laravel resource class cho phép chúng ta dễ dàng chuyển đổi các model và model collections thành JSON.(kết quả trả về ở dạng json)

// ProductController.php, Resources/ProductResource.php(php artisan make:resource ProductResource) (ngoài ra có các model product, comment, people và các file migrate)

Route::resource('products', 'ProductController'); // function show http://localhost/MyLaravel/public/products/2


// +++ muốn tạo dữ liệu face thì dùng : model-factory(database/factory)

/*add dòng insert vào các bảng */

/*      factory(App\Product::class, 5)
           ->create()
           ->each(function ($u) {
                $u->comments()->save(factory(App\Comment::class)->create());
            }
        );

        // Creates authors with no articles
        factory(App\People::class, 2)->create();

        // Creates Articles without Comments
        factory(App\Product::class, 3)->create();*/

// https://viblo.asia/p/seeder-va-model-factory-trong-laravel-ban-da-thu-chua-ByEZkvoAKQ0
