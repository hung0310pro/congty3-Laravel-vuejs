<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ReportModelLoaiTin extends Model
{
    const NAME_TABLE = 'loaitin';

    protected $loaitin;

    public function __construct(
    	ModelLoaitin $loaitin
    ){
    	$this->loaitin = $loaitin;
    }

    public function getDanhSach(){
    	$listDanhSach = $this->loaitin::all();
    	return $listDanhSach;
    }

    public function XoaLoaiTin($id){
    	$xoaLoaiTin = $this->loaitin::findOrFail($id);
    	$xoaLoaiTin->delete();
    }

    public function saveLoaiTin($loaitins){
    	$this->loaitin->ten = $loaitins->getTen();
    	$this->loaitin->id_theloai = $loaitins->getIdTheLoai();
    	$this->loaitin->save();
    }

    public function getLoaiTinInFo($id){
    	$loaitin = $this->loaitin::findOrFail($id);
    	return $loaitin;
    }


    public function updateLoaiTin($loaitins){
    	$checkLoaiTin = $this->loaitin->findOrFail($loaitins->getId());
    	$checkLoaiTin->ten = $loaitins->getTen();
    	$checkLoaiTin->id_theloai = $loaitins->getIdTheLoai();
    	$checkLoaiTin->save();
    }
    
}
