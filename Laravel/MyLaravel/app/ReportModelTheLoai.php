<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportModelTheLoai extends Model
{
    const NAME_TABLE = 'theloai';

    protected $theloai;

    public function __construct(
    	ModelTheloai $theloai
    ){
    	$this->theloai = $theloai;
    }

	public function getListDanhSach()
	{
		return $listSach = $this->theloai::all();
	}

	public function saveTheLoai($theloai){
		$this->theloai->ten = $theloai->getTen();
		$this->theloai->save();
	}

	public function findTheLoai($id){
	    $theloai = $this->theloai::findOrFail($id);
	    return $theloai;
	}

	public function updateTheLoai($theloai){
		$theloaiCheck = $this->theloai::findOrFail($theloai->getId());
		$theloaiCheck->ten = $theloai->getTen();
		$theloaiCheck->save();
	}

	public function xoaTheLoai($id){
		$theloaiCheck = $this->theloai::findOrFail($id);
		$theloaiCheck->delete();
	}
}
