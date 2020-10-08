<?php

class LogMessage {
    public $reff_number = 0;
    public $log_message = 'No Message.';
    public $logfile = '';		
    public $fp;
    
    function __construct()
        {
            $this->logfile = $_SERVER['DOCUMENT_ROOT'] . '/stage/log/error.log';
        }
        
        
    function write_log_message($modulename = 'N/A' ,$error_msg = 'No message provided',$sql='N/A',$file='N/A',$request_from ='N/A') {
        $this->fp = fopen($this->logfile, 'ab');
        
        fwrite($this->fp,"\r\nDate:\t" . date('d-M-Y h:i:s A') . "\t By User:" . $request_from . "\r\nModule Name: \t" . $modulename .   "\r\nMessage:\t" . $error_msg . "\r\nSQL:\t" . $sql . "\r\nFile:\t" . $file . "\r\n");
    }
    
    function read_log_message() {
        
            //echo $this->logfile;
            //echo ;
    }
}

//$el=new LogMessage();
//$el->write_log_message(0,'This is test message');
?>