<?php
require APPPATH.'libraries/Elevens.php';

class Users extends Elevens {

    function __construct(){
        parent::__construct();
        $this->load->model('users_model','mm');
    }

    function index(){
        $args['title'] = 'Users';
        $args['content'] = 'settings/users/index';
        $args['plugin'] = ['datatables'];
        $args['users'] = $this->mm->get();
        template($args);
    }

    function add(){
        $args['title'] = 'Tambah Users Baru';
        $args['content'] = 'settings/users/add';
        $args['user_group'] = $this->mm->get_group();
        // $args['plugin'] = ['datepicker'];
        template($args);
    }

}