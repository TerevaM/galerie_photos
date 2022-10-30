<?php

namespace App\Globals;

class Globals{
    private $GET;

    public function __construct()
    {
        $this->GET = filter_input_array(INPUT_GET);
        $this->POST = filter_input_array(INPUT_POST); 
    }

    public function getGET($key = null) {
        if(null !== $key) {
            return $this->GET[$key] ?? null;
        }
        return $this->GET;
    }
    public function getPOST($key = null) {
        if(null !== $key) {
            return $this->POST[$key] ?? null;
        }
        return $this->POST;
    }
}