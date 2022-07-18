<?php 

function user_session($user)
{
    $data = [
        'id'            =>  $user->user_id,
        'first_name'    =>  $user->first_name,
        'last_name'     =>  $user->last_name,
        'username'      =>  $user->username,
        'role'          =>  $user->role_id,
        'avatar'        =>  $user->avatar
    ];

    return session()->set('user_session', $data);
}

function user_avatar($avatar)
{
    if ( $avatar == 'default-avatar.png' ) {
        return base_url('assets/img/default-avatar.png');
    } else {
        return base_url('uploads/' . $avatar);
    }
}