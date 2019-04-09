<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 05-Dec-18
 * Time: 1:46 AM
 */

function getAuthorName($id){
    if (!empty($id)){
        $t=get_instance();
        $t->load->model("Author_model");

        $author=$t->Author_model->find(
            array(
                "Id"        =>$id
            )
        );

        if (!empty($author)){
            return $author->fullName;
        }else{
            return "Anonim";
        }
    }
}