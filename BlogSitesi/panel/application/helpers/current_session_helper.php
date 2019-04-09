<?php


function getAdminSession(){
    $t=&get_instance();

    $user=$t->session->userdata("loginUser");

    if (!empty($user))
            return $user;
    else
            return null;
}


function getMemberSession(){
    $t=&get_instance();

    $member=$t->session->userdata("member");

    if (!empty($member)){
        return $member;
    }else
        return false;

}