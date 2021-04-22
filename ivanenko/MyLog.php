<?php
namespace ivanenko;

include "LogAbstract.php";
include "LogInterface.php";

use core\LogInterface;
use core\LogAbstract;

class MyLog extends LogAbstract implements LogInterface {
    public static function write() {
        MyLog::Instance()->_write();
    }
    
    public function _write() {
		
		$d = new DateTime();
		$filename = "log/".$d->format('d.m.Y_T_H.i.s.u').".log";
		
		$dirname ="log";
		

        if(!(is_dir($dirname))){
            mkdir($dirname, 0222, true);
        }

        $logfile = "";

		
        foreach ($this->log as &$value) {
            echo($value."\r\n");
			$logfile .= $value."\r\n";
        }
    }
	
	 file_put_contents($filename, $logfile);
    
	 public static function write(){
        self::Instance()->_write();
	
    public static function log($str) {
        MyLog::Instance()->log_internal($str);
    }
    
    protected function log_internal($str) {
        $this->log[] = $str;
    }
}


?>
