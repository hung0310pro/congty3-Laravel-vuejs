<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TheLoaiController extends Controller
{
	protected $modelTheLoai;
	protected $reportModelTheLoai;

    public function __construct(
    	\App\ModelTheloai $modelTheLoai,
    	\App\ReportModelTheLoai $reportModelTheLoai
    ){
    	$this->modelTheLoai = $modelTheLoai;
    	$this->reportModelTheLoai = $reportModelTheLoai;
    }

    protected function GetDanhSach(){
    	$listTheloai = $this->reportModelTheLoai->getListDanhSach();
    	return view('Templateprojecttintuc.admin.theloai.danhsach',['listTheloai' => $listTheloai]);
    }

    protected function getThemDanhSach(){
    	return view('Templateprojecttintuc.admin.theloai.them');
    }

    protected function postThemDanhSach(Request $request){
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
            if($request->ten){
                $this->modelTheLoai->setTen($request->ten);
                $this->reportModelTheLoai->saveTheLoai($this->modelTheLoai);
                return redirect('admin/theloai/them')->with('thongbao','Thêm thành công');
            }
        }
    }

    protected function getSuaDanhSach($id){
        $theloai = $this->reportModelTheLoai->findTheLoai($id);
        return view('Templateprojecttintuc.admin.theloai.sua',['theloai' => $theloai]);
    }

    protected function postSuaDanhSach(Request $request){
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
            
            $this->modelTheLoai->setTen($request->ten);
            $this->modelTheLoai->setId($request->id);
            $this->reportModelTheLoai->updateTheLoai($this->modelTheLoai);
            return redirect('admin/theloai/sua/'.$request->id)->with('thongbaosua','Sửa thành công');
            
        }
    }

    protected function xoaTheLoaiDanhSach(Request $request){
        if($request->id){
            $this->reportModelTheLoai->xoaTheLoai($request->id);
            return redirect('admin/theloai/danhsach')->with('thongbaoxoa','Xóa thành công');
        }else{
            return redirect('admin/theloai/danhsach')->with('loithongbaoxoa','Xóa không thành công');
        }
    }
}
