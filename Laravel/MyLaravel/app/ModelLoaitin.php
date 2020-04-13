<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelLoaitin extends Model
{
    protected $id;

    protected $ten;

    protected $id_theloai;

    protected $table = "loaitin";

    // liên kết từ cha tới con, ModelTintuc của con
    public function LoaiTinhasManyTintuc(){
    	// id_loaitin khóa phụ của model ModelTintuc
    	return $this->hasMany('App\ModelTintuc','id_loaitin','id');
    }

    // liên kết từ con tới cha, ModelTheloai của cha
    public function LoaiTinHasOneTheLoai(){
    	// 1 loai tin thì chỉ có 1 thể loại 
    	// id_theloai khóa phụ của ModelLoaitin
    	return $this->belongsTo('App\ModelTheloai','id_theloai','id');
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setTen($ten){
        $this->ten = $ten;
    }

    public function getTen(){
        return $this->ten;
    }

    public function setIdTheLoai($id_theloai){
        $this->id_theloai = $id_theloai;
    }

    public function getIdTheLoai(){
        return $this->id_theloai;
    }
}
