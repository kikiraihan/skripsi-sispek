<?php
namespace App\Traits;


trait StringParser
{
    function get_string_between($string, $start, $end){
        $string = ' ' . $string;
        $ini = strpos($string, $start);
        if ($ini == 0) return '';
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len);
    }

    function ambil_parameter($metodeTerpotong)
    {
        $metodeTerpotong;
        $parsed = $this->get_string_between($metodeTerpotong, '(', ')');
        $parsed = explode(',',$parsed);

        foreach($parsed as $par)
        {
            //foreach array
            //kosongkan petik //otomatis dikasih petik dua nnti kalau so di json_encode
            $par=str_replace("'",'',$par);
            $return[]=str_replace('"','',$par);
        }

        return $return;
    }

    function ambil_nama_fungsi($metodeTerpotong)
    {
        $metodeTerpotong;
        $parsed = str_replace($this->get_string_between($metodeTerpotong, '(', ')'),'',$metodeTerpotong);
        return $parsed;
    }

    function cek_apakah_fungsi($parsed)
    {
        return strpos($parsed, '()');
    }

}