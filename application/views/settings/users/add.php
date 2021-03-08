<?php

$list['user_group'] = array();
foreach($user_group as $key => $val){
    array_push($list['user_group'], ['id' => $val['id'], 'text' => $val['nama']]);
}

echo portlet().
    portitle(['title' => $title, 
        'action' => button(['icon' => 'fa fa-arrow-left', 'text' => 'Kembali', 'target' => base_url('settings/users'), 'color' => 'warning'])
    ]).
    portbody(
        form(['action' => base_url(['action' => 'anggota/add'])]).
            form_body().
                '<div class="row">'.
                    '<div class="col-sm-6">'.
                        input_text('Nama Lengkap','nama').
                        input_email('Email','email').
                        input_select('User Grup','user_grup',$list['user_group']).
                        input_password('Password','password').
                        input_password('Konfirmasi Password','confirm').
                    '</div>'.
                '</div>'.
            form_body('end').
            form_actions().
                input_submit('Simpan').
            form_actions('end').
        form(['state' => 'end'])
    ).
portlet(['state' => 'end']);