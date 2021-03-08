<?php

class Elevens extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper('elevens');
        $this->load->helper('tmpng');
    }

}