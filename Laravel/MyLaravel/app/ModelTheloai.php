<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelTheloai extends Model
{
    protected $table = "theloai";

    private $id;
    private $ten;

    /*public function getTenAttribute($value)
    {
        return md5($value);
    }*/

    // liên kết từ cha tới con model của con
    public function theloaihasManyLoaitin(){
    	// khóa phụ của model ModelLoaitin
    	return $this->hasMany('App\ModelLoaitin','id_theloai','id');
    }

    // bảng trung gian của thể loại và loại tin
    // id_theloai là khóa phụ nằm trong  ModelLoaitin, id_loaitin là khóa phụ trong ModelTintuc
    public function tintucTrunggiantltt(){
    	return $this->hasManyThrough('App\ModelTintuc','App\ModelLoaitin','id_theloai','id_loaitin');
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
}
