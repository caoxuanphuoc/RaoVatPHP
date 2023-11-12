<?php
namespace RAOVAT\Responses;
class ResponseData{
    public $status;
    public $message;
    public $data;
    public function __construct($status, $message, $data){
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }
}


?>