<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
    protected $modelLoaiTin;
    protected $reportModelTheLoai;
    protected $reportModelLoaiTin;

    public function __construct(
    	\App\ModelLoaitin $modelLoaiTin,
    	\App\ReportModelTheLoai $reportModelTheLoai,
    	\App\ReportModelLoaiTin $reportModelLoaiTin
    ){
    	$this->modelLoaiTin = $modelLoaiTin;
    	$this->reportModelTheLoai = $reportModelTheLoai;
    	$this->reportModelLoaiTin = $reportModelLoaiTin;
    }

    public function GetDanhSach(){
    	$listDanhSach = $this->reportModelLoaiTin->getDanhSach();
    	if(count($listDanhSach->toArray()) > 0){
    		return view('Templateprojecttintuc.admin.loaitin.danhsach',['listDanhSach' => $listDanhSach]);
    	}
    }

    public function getThemDanhSach(){
    	$listTheloai = $this->reportModelTheLoai->getListDanhSach();
    	return view('Templateprojecttintuc.admin.loaitin.them',['listTheloai' => $listTheloai]);
    }

    public function postThemDanhSach(Request $request){
    	if($request->submit){
		    $this->validate($request,
		        [
		            'ten' => 'required|min:3|max:100'
		        ],
		        [
		            'ten.required' => 'Xin mời bạn điền tên thể loại',
		            'ten.min' => 'Nhập tối thiểu là 3 ký tự',
		            'ten.max' => 'Nhập tối đa là 100 ký tự'
		        ]
		    );

		    $this->modelLoaiTin->setTen($request->ten);
		    $this->modelLoaiTin->setIdTheLoai($request->theloaiid);
		    $this->reportModelLoaiTin->saveLoaiTin($this->modelLoaiTin);

		    return redirect('admin/loaitin/them')->with('thongbao','Thêm Thành Công');
    	}else{
    		return redirect('admin/loaitin/them')->with('thongbaoloi','Chưa Thêm Thành Công');
    	}
    }

    public function xoaTinTucDanhSach(Request $request){
    	if($request->id){
    		$this->reportModelLoaiTin->XoaLoaiTin($request->id);
            return redirect('admin/loaitin/danhsach')->with('thongbaoxoa','Xóa Thành Công');
		}else{
			return redirect('admin/loaitin/danhsach')->with('loithongbaoxoa','Xóa Không Thành Công');
		}
    }

    public function getSuaDanhSach($id){
    	$loaitin = $this->reportModelLoaiTin->getLoaiTinInFo($id);
    	$listTheloai = $this->reportModelTheLoai->getListDanhSach();
    	if(count($loaitin->toArray())){
    		return view('Templateprojecttintuc.admin.loaitin.sua',['loaitin' => $loaitin,'listTheloai' => $listTheloai]);
    	}else{
    		return redirect('admin/loaitin/danhsach');
    	}
    }

    public function postSuaDanhSach(Request $request){
    	if($request->submit){
    		// unique:loaitin check xem trường tên k đc trùng trong bang loai tin
		    $this->validate($request,
		        [
		            'ten' => 'required|unique:loaitin,ten|min:3|max:100'
		        ],
		        [
		        	'ten.unique' => 'Tên này đã bị trùng',
		            'ten.required' => 'Xin mời bạn điền tên thể loại',
		            'ten.min' => 'Nhập tối thiểu là 3 ký tự',
		            'ten.max' => 'Nhập tối đa là 100 ký tự'
		        ]
		    );

		    $this->modelLoaiTin->setTen($request->ten);
		    $this->modelLoaiTin->setIdTheLoai($request->theloaiid);
		    $this->modelLoaiTin->setId($request->id);
		    $this->reportModelLoaiTin->updateLoaiTin($this->modelLoaiTin);
		    return redirect('admin/loaitin/sua/'.$request->id)->with('thongbao','Thêm Thành Công');
    	}
    }
}
