<?php

class Wastrap{

    private $_url = null;
    private $_controller = null;

    function __construct(){

        $this->_getUrl();

        Session::init();

        if(empty($this->_url[0])){
            $this->_loadDefaultController();
            return false;
        }
       // print_r($url);


        $this->_loadExistingController();


        $this->_callControllerMethod();

        
    }


    private function _getUrl(){
        $url = isset($_GET['url'])?$_GET['url']:null;
        $url = rtrim($url,'/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    private function _loadDefaultController(){
            require 'controllers/index.php';
            $this->_controller = new Index();
            $this->_controller->index();
    }

     private function _loadExistingController(){
            $file = 'controllers/'.$this->_url[0].'.php';
        if(file_exists($file)){
            require $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0]);
        } else{
            $this->_error();
            return false;
        }

        
    }

    private function _callControllerMethod(){

        

        $length = count($this->_url);

        if($length>1){
            if(!method_exists($this->_controller, $this->_url[1])){
                $this->_error();
            }
        }

        switch ($length){
            case 5:
            $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3],$this->_url[4]);
                break;
            case 4:
            $this->_controller->{$this->_url[1]}($this->_url[2],$this->_url[3]);
                break;
            case 3:
            $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            case 2:
            $this->_controller->{$this->_url[1]}();
                break;
            default:
            $this->_controller->index();;
                break;
        }
           
    }


    private function _error(){
        require 'controllers/error.php';
                $err = new ErrorE();
                $err->index("Required method doesn't exist!");
                return false;
    }

    public function alert($msg){
    echo "<script type='text/javascript'>alert('$msg');</script>";
    }
}