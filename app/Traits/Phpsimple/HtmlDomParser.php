<?php
namespace App\Traits\Phpsimple;

require 'lib'.DIRECTORY_SEPARATOR.'simple_html_dom.php';


trait HtmlDomParser
{
    static public function file_get_html() {
        return call_user_func_array('\simple_html_dom\file_get_html' , func_get_args());
    }

    static public function str_get_html() {
        return call_user_func_array('\simple_html_dom\str_get_html' , func_get_args());
    }

}