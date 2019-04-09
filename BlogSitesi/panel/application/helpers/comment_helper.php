<?php


function getComments($Id){
    if (!empty($Id)){
        $t=&get_instance();
        $t->load->model("Comment_model");

        $subComments = $t->Comment_model->joinWithOthers(
            "comment.*,member.user_name",
            array(
                "comment.isDeleted" => 0,
                "article.isDraft" => 0,
                "article.isDeleted" =>0,
                "member.isDeleted" => 0,
                "member.isBlocked" => 0,
                "member.isActive" => 1,
                "comment.parent_comment_id" => $Id,
            ),
            "article.Id ASC",
            null,
            null,
            array(),
            array(),
            array(

                array(
                    "jTable" => "article",
                    "condition" => "article.Id=comment.article_id",
                    "type" => ""
                ),
                array(
                    "jTable" => "member",
                    "condition" => "member.Id=comment.member_id",
                    "type" => ""
                )


            )
        );
        if (!empty($subComments)){
            return $subComments;
        }

        return false;
    }else{

        redirect(base_url(""));
        die();
    }
}

function getCommentCount($Id){

    $t=&get_instance();
    $t->load->model("Comment_model");
    $articleCommentCount = $t->Comment_model->joinWithOthersCount(
        array(
            "comment.isDeleted" => 0,
            "article.isDraft" => 0,
            "article.isDeleted" =>0,
            "member.isDeleted" => 0,
            "member.isBlocked" => 0,
            "member.isActive" => 1,
            "comment.article_id" => $Id,
        ),
        array(),
        array(),
        array(

            array(
                "jTable" => "article",
                "condition" => "article.Id=comment.article_id",
                "type" => ""
            ),
            array(
                "jTable" => "member",
                "condition" => "member.Id=comment.member_id",
                "type" => ""
            )


        )
    );

    return $articleCommentCount;
}