<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportModelTinTuc extends Model
{
    protected $tintuc;

    public function __construct(
    	ModelTintuc $tintuc
    ){
    	$this->tintuc = $tintuc;
    }

    public function getListTinTuc(){
    	// get all tin tuc nhung theo dang giam dan
        return $this->tintuc::orderBy('id','DESC')->paginate(3);
    	/*return $this->tintuc::orderBy('id','DESC')->get();*/
    }

    public function saveTinTuc($tintuc){
    	$this->tintuc->tieude = $tintuc->getTieuDe();
    	$this->tintuc->noidung = $tintuc->getNoiDung();
    	$this->tintuc->hinhanh = $tintuc->getHinhAnh();
    	$this->tintuc->id_loaitin = $tintuc->getIdLoaiTin();
    	$this->tintuc->save();
    }

    public function getSuaTinTuc($id){
    	$tintuc = $this->tintuc::findOrFail($id);
    	return $tintuc;
    }
}
