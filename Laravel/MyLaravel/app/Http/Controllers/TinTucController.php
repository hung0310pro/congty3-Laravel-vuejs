<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinTucController extends Controller
{
    protected $modelTintuc;

    protected $reportModelTinTuc;

    protected $reportModelLoaiTin;

    protected $reportModelTheLoai;

    protected $modelLoaitin;

    public function __construct(
    	\App\ModelTintuc $modelTintuc,
    	\App\ReportModelTinTuc $reportModelTinTuc,
    	\App\ReportModelLoaiTin $reportModelLoaiTin,
    	\App\ModelLoaitin $modelLoaitin,
    	\App\ReportModelTheLoai $reportModelTheLoai
    ){
    	$this->modelTintuc = $modelTintuc;
    	$this->reportModelTinTuc = $reportModelTinTuc;
    	$this->reportModelLoaiTin = $reportModelLoaiTin;
    	$this->modelLoaitin = $modelLoaitin;
    	$this->reportModelTheLoai = $reportModelTheLoai;
    }

    public function GetDanhSach(){
    	$listTinTuc = $this->reportModelTinTuc->getListTinTuc();
    	return view('Templateprojecttintuc.admin.tintuc.danhsach',['listTinTuc' => $listTinTuc]);
    }

    public function getThemDanhSach(){
    	$listLoaiTin = $this->reportModelLoaiTin->getDanhSach();
    	$listTheLoai = $this->reportModelTheLoai->getListDanhSach();
    	return view('Templateprojecttintuc.admin.tintuc.them',['listLoaiTin' => $listLoaiTin,'listTheLoai' => $listTheLoai]);
    }

    public function getAjaxLoaiTin(Request $request){
    	$idTheLoai = $request->theloaiid;
    	$listLoaiTinAjax = $this->modelLoaitin::where('id_theloai',$idTheLoai)->get();
    	return json_encode($listLoaiTinAjax);
    }

    public function postThemDanhSach(Request $request){
    	$this->modelTintuc->setTieuDe($request->tieude);
    	$this->modelTintuc->setNoiDung($request->noidung);
    	$this->modelTintuc->setIdLoaiTin($request->theloaiid);
    	if($request->hasFile('hinhanh')){
    		$file = $request->file('hinhanh');
    		$checkFile = $file->getClientOriginalExtension('hinhanh');
    		if($checkFile == 'jpg' || $checkFile == 'png'){
	    		$filename = $file->getClientOriginalName('hinhanh');
	    		$file->move('folderupload',$filename);
	    		$this->modelTintuc->setHinhAnh($filename);
    		}else{
    			return redirect('admin/tintuc/them')->with('thongbaoloi','Bạn chỉ được up hình ảnh');
    		}
    	}else{
    		$filename = "";
    		$this->modelTintuc->setHinhAnh($filename);
    	}
    	$this->reportModelTinTuc->saveTinTuc($this->modelTintuc);
    	return redirect('admin/tintuc/them')->with('thongbao','Thêm thành công');
    }

    public function getSuaDanhSach($id){
    	$tinTuc = $this->reportModelTinTuc->getSuaTinTuc($id);
 
    	return view('Templateprojecttintuc.admin.tintuc.sua',['tinTuc' => $tinTuc]);
    }
}
