<?php

function convertToSeo($text){
    $after = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', ' ', '.','#');
    $before = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', '-', '-','sharp');
    $seoText = str_replace($after, $before, $text);
    $seoText = preg_replace("@[^A-Za-z0-9\.\-_]@i", '', $seoText);
    $seoText = preg_replace('/-+/', '-', $seoText);
    $seoText = strtolower($seoText);
    $seoText=trim($seoText,'-');
    return $seoText;
    }


