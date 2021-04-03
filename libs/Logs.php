<?php

class Logs {

	public static function writeLog($type,$filename,$note=False){
		$url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$file = 'logs/'.date('Y-m-d').'_'.$type.'.txt';
		if (!file_exists($file)) {
			file_put_contents($file, '');
		}
		$content = '
===========================
IP: ' . $_SERVER['REMOTE_ADDR'] . '
Time: ' . date('d/m/Y H:i:s a') . '
Filename: ' . $filename . '
URL: ' . $url . '
';
		if($note){
			$content .= 'Note: ' . $note . '
';
		}
		file_put_contents($file, $content, FILE_APPEND);
	}

	public static function writeSessionLog($action,$result,$username,$note=False){
		$url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$file = 'logs/'.date('Y-m-d').'_session_log.txt';
		if (!file_exists($file)) {
			file_put_contents($file, '');
		}
		$content = '
===========================
IP: ' . $_SERVER['REMOTE_ADDR'] . '
Time: ' . date('d/m/Y H:i:s a') . '
Username: ' . $username . '
Action: ' . $action . '
Result: ' . $result . '
URL: ' . $url . '
';
		if($note){
			$content .= 'Note: ' . $note . '
';
		}
		file_put_contents($file, $content, FILE_APPEND);
	}

	public static function writeApplicationLog($action,$result,$username,$data=array()){
		$url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$file = 'logs/'.date('Y-m-d').'_application_log.txt';
		if (!file_exists($file)) {
			file_put_contents($file, '');
		}
		$content = '
===========================
IP: ' . $_SERVER['REMOTE_ADDR'] . '
Time: ' . date('d/m/Y H:i:s a') . '
Username: ' . $username . '
Action: ' . $action . '
Result: ' . $result . '
URL: ' . $url . '
';
		if(!empty($data)){
			$content .= 'Info: ' . implode(",", $data) . '
';
		}
		file_put_contents($file, $content, FILE_APPEND);
	}
}
