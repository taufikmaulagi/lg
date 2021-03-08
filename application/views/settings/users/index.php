<?php

//Users Index Page

$list['users'] = array();
$number = 1;
foreach($users as $key => $val){
    $tmp['status'] = $val['status'] == 'AKTIF' ? badge(['color' => 'primary', 'text' => 'AKTIF']) : badge(['color' => 'danger', 'text' => 'NONAKTIF']);
    array_push($list['users'], [
        $number++, 
        $val['nama'], 
        $val['email'],
        $val['user_group'],
        $tmp['status'],
        strftime('%e %B %Y %k:%M', strtotime($val['created_at'])), 
        button(['icon' => 'fa fa-edit','text' => 'Edit','color' => 'warning', 'size' => 'xs','target' => base_url('settings/users/edit/'.$val['id'])]).' '.button(['icon' => 'fa fa-trash-o','text' => 'Hapus','color' => 'danger', 'size' => 'xs', 'target' => base_url('settings/users/delete/'.$val['id'])])
    ]);
}

echo portlet().
    portitle(['title' => $title, 
        'action' => button(['icon' => 'fa fa-plus', 'text' => 'Tambah Baru', 'target' => base_url('settings/users/add')]).
                    button(['icon' => 'fa fa-users', 'text' => 'User Grup', 'target' => base_url('settings/users/group'), 'color' => 'success']).
                    button(['icon' => 'fa fa-unlock-alt', 'text' => 'User Privileges', 'target' => base_url('settings/users/privileges'), 'color' => 'danger'])
    ]).
    portbody(
        datatable(
            ['#','Nama Lengkap','Email','Grup','Status', 'Tanggal Mendaftar', 'Opsi'],
            $list['users']
        )
    ).
portlet(['state' => 'end']);