<?php
/**
 * Created by PhpStorm.
 * User: HUSEYIN-PC
 * Date: 20-Dec-18
 * Time: 10:19 PM
 */

class Simpleimagelib
{
    public function __construct()
    {
        require_once ("vendor/autoload.php");
    }

    public function get_instance(){
        return new \claviska\SimpleImage();
    }
}