<?php
function getSettings(){
    $t=&get_instance();

    $settings=$t->session->userdata("settings");
    if (empty($settings)){
        $t->load->model("Setting_model");

        $settings=$t->Setting_model->find(
            array(
                "Id"        =>1
            )
        );

        $t->session->set_userdata("settings",$settings);
    }

    return $settings;
}