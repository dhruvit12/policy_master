<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * My_Parser View
 * Create by Mukesh Kumar

 * 2020
 *
 */



class MY_Parser extends CI_Parser {

    function tpl($view, $data) {
    	
        $this->parse($this->settings['theme'].'/'.'header', $data);
        $this->parse($this->settings['theme'].'/'.$view, $data);
        $this->parse($this->settings['theme'].'/'.'footer', $data);
    }    
}
