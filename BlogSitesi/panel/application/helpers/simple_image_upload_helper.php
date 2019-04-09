<?php


function simpleImageUpload($file, $uploadPath, $width="", $height="", $name)
{
    $t =& get_instance();
    $t->load->library('image_lib');
    $config['image_library'] = 'gd2';
    $config['source_image'] = $file;
    $config['new_image'] = "{$uploadPath}/$name";
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = TRUE;
    if (!empty($width))
    $config['width']         = $width;
    if (!empty($height))
    $config['height']       = $height;
    $config['wm_text'] = $name;
    $config['wm_type'] = 'text';
    $config['wm_font_size'] = 16;

    $t->image_lib->initialize($config);
    //$t->load->library('image_lib', $config);
    $t->image_lib->watermark();
    if ($t->image_lib->resize()){

       return true;
    }else{
        echo $this->image_lib->display_errors();
    }


    /*$t =& get_instance();
    $t->load->library("simpleimagelib");

    $uploadError = false;

    try {

        $image = $t->simpleimagelib->get_instance();


        $image->fromFile($file)
            ->thumbnail($width, $height, "center")
            ->toFile("{$uploadPath}/$name", 'image/png');


    } catch (Exception $err) {

        $error = $err->getMessage();
        $uploadError = true;
    }

    if ($uploadError) {
        echo $error;
    } else {
        return true;
    }*/

}