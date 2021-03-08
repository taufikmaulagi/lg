<?php

function template($args=array()){
    $el =& get_instance();
    $args['template'] = empty($args['template']) ? 'default' : $args['template'];
    $args['content'] = empty($args['content']) ? 'template/empty' : $args['content'];
    $args['title'] = empty($args['title']) ? 'Judul Belum Ditentukan! Segera Perbaiki 🤪' : $args['title'];
    $args['plugin'] = empty($args['plugin']) ? array() : $args['plugin'];
    $args['heaplug'] = '';
    $args['fooplug'] = '';
    foreach($args['plugin'] as $key => $val){
        $args['heaplug'] .= load_plugin($val)['head'];
        $args['fooplug'] .= load_plugin($val)['foot'];
    }
    $el->load->view('template/'.$args['template'].'/head', $args);
    $el->load->view('template/'.$args['template'].'/nav');
    $el->load->view('template/'.$args['template'].'/menu');
    $el->load->view('template/'.$args['template'].'/bread');
    $el->load->view($args['content']);
    $el->load->view('template/'.$args['template'].'/foot');
}

function assets($path=''){
    return base_url('assets/'.$path);
}

function load_img($path=''){
    return base_url('assets/images/'.$path);
}

function load_plugin($plugin){
    switch($plugin){
        case 'datatables' :
            return [
                'head' => '<link rel="stylesheet" type="text/css" href="'.assets('global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css').'"/>',
                'foot' => ' <script type="text/javascript" src="'.assets('global/plugins/datatables/media/js/jquery.dataTables.min.js').'"></script>
                            <script type="text/javascript" src="'.assets('global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js').'"></script>
                            <script src="'.assets('admin/pages/scripts/table-advanced.js').'"></script>
                            <script>TableAdvanced.init();</script>',
            ];
        break;
    }
}
