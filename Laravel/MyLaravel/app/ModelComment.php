<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelComment extends Model
{
    protected $table = "comment";

    // liên kết từ con tới cha, ModelTintuc là bảng cha
    public function CommenthasOneTintuc(){
    	// id_tintuc khóa phụ của model ModelComment
    	return $this->belongsTo('App\ModelTintuc','id_tintuc','id');
    }

    // liên kết từ con tới cha
    public function CommenthasOneUser1(){
    	// 1 loai tin thì chỉ có 1 thể loại ModelUsers1 là bảng cha
    	// id_user khóa phụ của ModelComment
    	return $this->belongsTo('App\ModelUsers1','id_user','id');
    }
}
