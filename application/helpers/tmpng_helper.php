<?php

function portlet($args=array()){
    if(!empty($args['state']) == 'end')
        return '</div>';
    return '<div class="portlet light">';
}

function portitle($args=array()){
    $args['title'] = empty($args['title']) ? 'Ops..! Title is empty' : $args['title'];
    $args['action'] = empty($args['action']) ? '' : $args['action'];
	$args['icon'] = empty($args['icon']) ? '' : $args['icon'];
    return '<div class="portlet-title bold uppercase">
				<div class="caption">
					<i class="'.$args['icon'].'"></i>
					<span class="caption-subject">'.$args['title'].'</span>
				</div>
				<div class="actions">
					'.$args['action'].'
					<a href="javascript:;" class="btn btn-default btn-icon-only fullscreen" data-original-title="" title=""></a>
				</div>
			</div>';
}

function portbody($content){
	return '<div class="portlet-body" style="height: auto;">'.$content.'</div>';
}

function datatable($head, $body){
	$thead = '';
	$tbody = '';
	foreach($head as $key => $val){ $thead .= '<th>'.$val.'</th>';}
	foreach($body as $bkey => $bval){
		$tbody .= '<tr>';
		foreach($bval as $key => $val){ $tbody .= '<td>'.$val.'</td>';}
		$tbody .= '</tr>';
	}
	return '<table class="table table-bordered table-striped table-hover" id="basic">
				<thead>'.$thead.'</thead>
				<tbody>'.$tbody.'</tbody>
			</table>';
}

function button($args=array()){
	$args['color'] = empty($args['color']) ? 'primary' : $args['color'];
	$args['text'] = empty($args['text']) ? 'Button' : $args['text'];
	$args['target'] = empty($args['target']) ? 'javascipt:void(0)' : $args['target'];
	$args['icon'] = empty($args['icon']) ? '' : '<i class="'.$args['icon'].'"></i>';
	$args['size'] = empty($args['size']) ? 'sm' : $args['size'];
	return '<a href="'.$args['target'].'" class="btn btn-'.$args['size'].' btn-'.$args['color'].'">
				'.$args['icon'].'&nbsp;&nbsp;'.$args['text'].'
			</a>';
}

function button_icon($args=array()){
	$args['color'] = empty($args['color']) ? 'primary' : $args['color'];
	$args['target'] = empty($args['target']) ? 'javascipt:void(0)' : $args['target'];
	$args['icon'] = empty($args['icon']) ? '' : '<i class="'.$args['icon'].'"></i>';
	$args['size'] = empty($args['size']) ? 'sm' : $args['size'];
	return '<a href="'.$args['target'].'" class="btn btn-'.$args['size'].' btn-icon-only btn-'.$args['color'].'">
				'.$args['icon'].'
			</a>';
}

function badge($args=array()){
	$args['color'] = empty($args['color']) ? 'primary' : $args['color'];
	$args['text'] = empty($args['text']) ? 'Add Text' : $args['text'];
	return '<span class="badge badge-'.$args['color'].' badge-roundless"> '.$args['text'].' </span>';
}

function form($args=array()){
	if(!empty($args['state']) && $args['state'] == 'end')
		return '</form>';
	$args['enctype'] = empty($args['enctype']) ? '' : $args['enctype'];
	$args['method'] = empty($args['method']) ? '' : $args['method'];
	$args['action'] = empty($args['action']) ? '' : $args['action'];
    return '<form action="'.$args['action'].'" method="'.$args['method'].'" enctype="'.$args['enctype'].'" autocomplete="off">';
}

function input_text($label, $name, $value=''){
    $ci =& get_instance(); 
    $value = !empty($ci->input->post($name)) ? $ci->input->post($name) : $value;
    return '<div class="form-group">
            <label> '.$label.' </label>
            <input type="text" name="'.$name.'" class="form-control" placeholder="Masukan '.$label.' disini . ." value="'.$value.'">
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function input_email($label, $name, $value=''){
    $ci =& get_instance(); 
    $value = !empty($ci->input->post($name)) ? $ci->input->post($name) : $value;
    return '<div class="form-group">
            <label> '.$label.' </label>
            <input type="email" name="'.$name.'" class="form-control" placeholder="Masukan '.$label.' disini . ." value="'.$value.'">
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function input_text_disable($label, $name, $value=''){
    $ci =& get_instance(); 
    $value = !empty($ci->input->post($name)) ? $ci->input->post($name) : $value;
    return '<div class="form-group">
            <label> '.$label.' </label>
            <input type="text" name="'.$name.'" class="form-control" placeholder="Masukan '.$label.' disini . ." value="'.$value.'" disabled>
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function input_hidden($name, $value=''){
    return '<input type="hidden" name="'.$name.'" value="'.$value.'">';
}

function input_number($label, $name, $value=''){
    $ci =& get_instance(); 
    $value = !empty($ci->input->post($name)) ? $ci->input->post($name) : $value;
    return '<div class="form-group">
            <label> '.$label.' </label>
            <input type="number" name="'.$name.'" class="form-control" placeholder="Masukan '.$label.' disini . ." value="'.$value.'">
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function input_password($label, $name, $value=''){
    $ci =& get_instance(); 
    $value = !empty($ci->input->post($name)) ? $ci->input->post($name) : $value;
    return '<div class="form-group">
            <label> '.$label.' </label>
            <input type="password" name="'.$name.'" class="form-control" placeholder="Masukan '.$label.' disini . ." value="'.$value.'">
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function input_textarea($label, $name, $value=''){
    $ci =& get_instance(); 
    $value = !empty($ci->input->post($name)) ? $ci->input->post($name) : $value;
    return '<div class="form-group">
            <label> '.$label.' </label>
            <textarea name="'.$name.'" class="form-control" placeholder="Masukan '.$label.' disini . .">'.$value.'</textarea>
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function input_radio($label, $name, $data, $value=''){
    $option = '';
    $ci =& get_instance(); 
    foreach($data as $key => $val){
        if(empty($ci->input->post($name))){
            $checked = !empty($value) && $value == $val['id'] ? 'checked' : '';
        } else {
            $checked = $ci->input->post($name) == $val['id'] ? 'checked' : '';
        }
        $option.= '<label>';
        $option.= '<input type="radio" name="'.$name.'" value="'.$val['id'].'" '.$checked.'> '.$val['nama'].'</br/>';
        $option.= '</label>';
    }
    return '<div class="form-group">
            <label> '.$label.' </label><br/>
            <div class="radio-list">'
                .$option.
            '</div>
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function input_date($label, $name, $value='', $start='2000-03-01'){
    $ci =& get_instance(); 
    $value = !empty($ci->input->post($name)) ? $ci->input->post($name) : $value;
    return '<div class="form-group">
            <label> '.$label.' </label><br/>
            <div class="input-group input-medium date date-picker" data-date="'.$start.'" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
				<input type="text" class="form-control" name="'.$name.'" value="'.$value.'" readonly>
				<span class="input-group-btn">
					<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
				</span>
			</div>
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function input_select($label, $name, $data, $value=''){
    $ci =& get_instance();
    $option = '';
    foreach($data as $key => $val){
        if(empty($ci->input->post($name))){
            $selected = !empty($value) && $value == $val['id'] ? 'selected="selected"' : '';
        } else {
            $selected = $ci->input->post($name) == $val['id'] ? 'selected="selected"' : '';
        }
        $option.= '<option value="'.$val['id'].'" '.$selected.'> '.$val['text'].'</option>';
    }
    return '<div class="form-group">
            <label> '.$label.' </label><br/>
            <select name="'.$name.'" class="form-control">'
                .$option.
            '</select>
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function input_image($label, $name, $value=''){
    $value = empty($value) ? 'default.png' : '';
    return '<div class="form-group">
            <label> '.$label.' </label><br/>
            <img width="250px" class="img-thumbnail" id="img_pre" src="'.base_url('assets/image/'.$value).'"><br/><br/>
            <input type="file" name="'.$name.'" id="img_inp">
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function input_file($label, $name){
    return '<div class="form-group">
            <label> '.$label.' </label>
            <input type="file" name="'.$name.'" id="img_inp">
            <span class="help-block text-danger">'.form_error($name).'</span>
        </div>';
}

function form_body($state='begin'){
	if($state=='end')
		return '</div>';
    return '<div class="form-body">';
}

function form_actions($state='begin'){
	if($state=='end')
		return '</div>';
    return '<div class="form-actions">';
}

function input_submit($value, $color="blue"){
    return '<button type="submit" class="btn '.$color.'"><i class="fa fa-check"></i>&nbsp;&nbsp;'.$value.'</button>';
}

function image($img, $style='width:20%', $loc="assets/image/", $default="default.png"){
    if(empty($img)){
        $img = $default;
    }
    return '<img src="'.base_url($loc.$img).'" style="'.$style.'">';
}

function alert_flashdata($flashdata){
    $ci =& get_instance();
    if(!empty($ci->session->flashdata($flashdata))){
        echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                '.$ci->session->flashdata($flashdata).'
            </div>';
    }
}