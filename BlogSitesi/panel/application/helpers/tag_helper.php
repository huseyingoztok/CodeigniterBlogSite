<?php

function getTags(){
    $t=&get_instance();

    $tags=$t->session->userdata("tags");
    if (empty($categories)){
        $t->load->model("Tag_model");

        $tags=$t->Tag_model->getAll(
            array(
                "isDeleted" => 0,
            )
        );

        $t->session->set_userdata("tags",$tags);
    }

    return $tags;
}
