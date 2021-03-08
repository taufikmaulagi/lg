<?php

class Users_model extends CI_Model {

    function get($args=array()){
        $this->db->select('users.id, users.nama, email, password, status, users.created_at, user_group.id as id_user_group, user_group.nama as user_group');
        $this->db->join('user_group','user_group.id = users.user_group');
        if(!empty($args['id']))
            $this->db->where('users.id', $args['id']);
        $this->db->where('users.deleted_at',NULL);
        $this->db->where('user_group.deleted_at',NULL);
        return $this->db->get('users')->result_array();
    }

    function get_group($args=array()){
        return $this->db->get('user_group')->result_array();
    }

    function create($args){
        $this->db->trans_begin();
        $this->db->insert('users', $args);
        if($this->db->trans_statu() === TRUE)
            $this->db->trans_commit();
        else 
            $this->db->trans_rollback();
        return $this->db->trans_status();
    }

}