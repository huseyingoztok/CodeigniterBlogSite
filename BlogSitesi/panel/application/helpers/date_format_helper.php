<?php

function convertDate($date){
    setlocale(LC_TIME,'turkish');
    return strftime_tr(strftime("%e %B %Y",strtotime($date)));
}


function strftime_tr($date_format){
    $tarih    = iconv('latin5','utf-8',strftime($date_format));
    return $tarih;
}

function get_time_ago( $time )
{
    $time_difference = time() - $time;

    if( $time_difference < 1 ) { return 'az önce'; }
    $condition = array( 12 * 30 * 24 * 60 * 60 =>  'yıl',
        30 * 24 * 60 * 60       =>  'ay',
        24 * 60 * 60            =>  'gün',
        60 * 60                 =>  'saat',
        60                      =>  'dakika',
        1                       =>  'saniye'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $time_difference / $secs;

        if( $d >= 1 )
        {
            $t = round( $d );
            return ''. $t . ' ' . $str;
        }
    }
}