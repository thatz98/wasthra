<?php

require 'Form/Validate.php';

class Form{

//the imediatley posted item
	private $_currentItem = null;
//store the posted data
	private $_postData = array();

	private $_val = array();

	private $_error = array();

	public function __construct(){
		$this->_val = new Validate();
	}

	public function post($field){
		$this->_postData[$field] = $_POST[$field];
		$this->_currentItem = $field;
		return $this;
	}

	public function fetch($fieldName=false){
		if($fieldName){
			if(isset($this->_postData["$fieldName"])){
				return $this->_postData["$fieldName"];
			} else{
				return false;
			}
			
		} else{
		return $this->_postData;
		}
	}

	public function validate($validatorType,$arg=null){
		if($arg==null){
			$error = $this->_val->{$validatorType}($this->_postData[$this->_currentItem]);
		} else{
			$error = $this->_val->{$validatorType}($this->_postData[$this->_currentItem],$arg);
		}
		
		if($error){
			$this->_error[$this->_currentItem]= $error;
		}

		return $this;
	}

	public function submit(){
		if(empty($this->_error)){
			return true;
		} else{
			$errString = '';
			foreach ($this->_error as $key => $value) {
				$errString .= $key.' => '.$value."\n";
			}

			throw new Exception($errString);
			
		}
	}
} 