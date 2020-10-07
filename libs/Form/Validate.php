<?php

class Validate{

	public function __construct(){

	}

	public function minLength($data,$arg){
		if(strlen($data)<$arg){
			return "Your string can only be the $arg long";
		}
	}

	public function maxLength($data,$arg){
		if(strlen($data)>$arg){
			return "Your string can only be the $arg long";
		}
	}

	public function integer($data){
		if(ctype_digit($data)==false){
			return "Your string must be a digit";
		}
	}

	public function __call($name,$arg){
		throw new Exception("$name does not exist inside of: ".__CLASS__);
		
	}
}