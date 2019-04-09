<?php




function sendEmail($to,$title,$content){
    $t=&get_instance();
    $t->load->model("Email_model");
    $mailConfig=$t->Email_model->find(array(
        "Id"            =>1,
        "isActive"      =>1
    ));
    $config=array(
        "protocol"      =>$mailConfig->protocol,
        "smtp_host"     =>$mailConfig->host,
        "smtp_port"     =>$mailConfig->port,
        "smtp_user"     =>$mailConfig->_from,
        "smtp_pass"     =>$mailConfig->password,
        "starttls"      =>true,
        "charset"       =>"utf-8",
        "mailtype"      =>"html",
        "wordwrap"      =>true,
        "newline"       =>"\r\n"
    );

    $t->load->library("email",$config);

    $t->email->from($mailConfig->_from,getSettings()->site_name);
    $t->email->to($to);
    $t->email->subject($title);
    $t->email->message($content);

    return $send=$t->email->send();
}