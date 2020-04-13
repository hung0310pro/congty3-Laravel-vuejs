<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTintuc extends Model
{
    protected $table = "tintuc";

    protected $id;
    protected $tieude;
    protected $noidung;
    protected $hinhanh;
    protected $id_loaitin;

    // liên kết từ cha tới con, ModelComment là bảng con
    public function TintuchasManyComment(){
    	// id_tintuc khóa phụ của model ModelTintuc
    	return $this->hasMany('App\ModelComment','id_tintuc','id');
    }

    // liên kết từ con tới cha
    public function TintucHasOneLoaitin(){
    	// 1 loai tin thì chỉ có 1 thể loại ModelLoaitin là bảng cha
    	// và khác vs trên id_loaitin khóa phụ của ModelTintuc
    	return $this->belongsTo('App\ModelLoaitin','id_loaitin','id');
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setTieuDe($tieude){
        $this->tieude = $tieude;
    }

    public function setNoiDung($noidung){
        $this->noidung = $noidung;
    }

    public function setHinhAnh($hinhanh){
        $this->hinhanh = $hinhanh;
    }

    public function setIdLoaiTin($id_loaitin){
        $this->id_loaitin = $id_loaitin;
    }

    public function getId(){
        return $this->id;
    }

    public function getTieuDe(){
        return $this->tieude;
    }

    public function getNoiDung(){
        return $this->noidung;
    }

    public function getHinhAnh(){
        return $this->hinhanh;
    }

    public function getIdLoaiTin(){
        return $this->id_loaitin;
    }
}
