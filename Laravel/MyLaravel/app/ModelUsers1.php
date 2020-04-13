<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelUsers1 extends Model
{
    protected $table = "users1";
    protected $id;
    protected $name;
    protected $email;
    protected $level;
    protected $password;

    public function User1hasManyComment(){
    	return $this->hasMany('App\ModelComment','id_user','id');
    }

    public function setId($id){
    	$this->id = $id;
    }

    public function setName($name){
    	$this->name = $name;
    }

    public function setEmail($email){
    	$this->email = $email;
    }

    public function setLevel($level){
    	$this->level = $level;
    }

    public function setPassword($password){
    	$this->password = $password;
    }

    public function getId(){
    	return $this->id;
    }

    public function getName(){
    	return $this->name;
    }

    public function getEmail(){
    	return $this->email;
    }

    public function getLevel(){
    	return $this->level;
    }

    public function getPassword(){
    	return $this->password;
    }
}
