<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportModelUser1 extends Model
{
    protected $modelUsers1;

    public function __construct(
    	ModelUsers1 $modelUsers1
    ){
    	$this->modelUsers1 = $modelUsers1;
    }

    public function getListUser1(){
    	return $this->modelUsers1::all();
    }

    public function saveUser1($user1){
    	$this->modelUsers1->name = $user1->getName();
    	$this->modelUsers1->email = $user1->getEmail();
    	$this->modelUsers1->level = $user1->getLevel();
    	$this->modelUsers1->password = $user1->getPassword();
    	$this->modelUsers1->save();
    }
}
