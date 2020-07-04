<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\StringParser;

class Masterkriteria extends Model
{
    use StringParser;

    protected $fillable=
    [
        'title',
        'model_type',
        'jenis',
        'pathTo',
        'rasio',
    ];

    //kalau mo ambil semua property
    // $this->attributes; // key "id", "model_type" , "jenis" , "pathTo" , "rasio" , "created_at" , "updated_at"




    //SETTER
    //pathTo atribut menerima data berupa string path eloquent
    public function setPathToFromString($pathString)
    {

        $path=explode('->',$pathString);

        foreach($path as $key=>$p)
        {
            if($p!="")
            {
                $nama=$this->ambil_nama_fungsi($p);//funsi()
                $param=$this->ambil_parameter($p);//array

                if($this->cek_apakah_fungsi($nama)!==false)
                {
                    //fungsi

                    //jlh parameter
                    $counted=count($param);

                    $nama=str_replace('()','',$nama);
                    // $nama=str_replace('"','',$nama);
                    // $nama=str_replace("'",'',$nama);

                    //penentuan kode
                    if($param[0]!='')
                    {
                        $nama=$nama."03".$counted;
                        $return[$nama]=$param;
                    }
                    else
                    {
                        $nama=$nama."02";
                        $return[$nama]=null;
                    }

                }
                else
                {
                    //bukan fungsi
                    $return[$nama.'01']=null;
                }

            }
        }

        $this->attributes['pathTo'] = json_encode($return);
    }

    public function setPathToFromArray($array)
    {
        $this->attributes['pathTo'] = json_encode($array);
    }

    public function setRasioFromArray($array)
    {
        $this->attributes['rasio'] = json_encode($array);
    }





    //GETTER
    public function getRasioRenderArrayAttribute()
    {
        if($this->rasio!=NULL)
        {
            $rasio=json_decode($this->rasio);
            foreach ($rasio as $key => $isi) {
                $return[$key]=$isi;
            }
            return $return;
        }
        else return null;
    }

    public function getRasioRenderStringAttribute()
    {
        $return='';
        $baru='';

        $array=$this->RasioRenderArray;
        foreach($array as $rasio=>$nilai)
        {
            $baru=$return.$rasio."==".$nilai.",";

            //isi
            $return='';
            $return=$baru;
        }

        return $return;
    }


    public function getPathToDecodeAttribute()
    {
        return json_decode($this->pathTo);
    }

    public function getPathToRenderArrayAttribute()
    {
        foreach (json_decode($this->pathTo) as $path => $isi) {
            if($isi!=null){
                foreach($isi as $key=>$value)
                {
                    $return[$path][$key]=$value;
                }
            }
            else $return[$path]=$isi;
        }

        return $return;
    }



    public function getPathToRenderStringAttribute()
    {
        $return='';
        $baru='';

        foreach(json_decode($this->pathTo) as $path=>$isi)
        {
            $jenis=explode("0",$path)[1];
            $pth=explode("0",$path)[0];

            if($jenis==1)
            {
                //kolom/tabel
                // path04 ----> pivot
                $baru=$return."->".$pth;
            }
            elseif($jenis==2)
            {
                // kolom with kondisi, kolom tpi fungsi (matakuliah())
                // fungsi 0 parameter (get(),first(),count())
                $baru=$return."->".$pth."()";
            }
            elseif($jenis==31)
            {
                $baru=$return."->".$pth."('".$isi[0]."')";
                // fungsi 1 parameter
            }
            elseif($jenis==32)
            {
                $baru=$return."->".$pth."('".$isi[0]."','".$isi[1]."')";
                // fungsi 2 parameter
            }
            elseif($jenis==33)
            {
                // fungsi 3 parameter
                $baru=$return."->".$pth."('".$isi[0]."','".$isi[1]."','".$isi[2]."')";
            }

            //isi
            $return='';
            $return=$baru;
            // $baru='';
        }

        return $return;
    }







    public function PathToRenderModel($id_model)
    {
        $jenis_kriteria=$this->jenis;
        $rasio=$this->RasioRenderArray;

        $model=$this->model_type::find($id_model);


        //penelusuran
        //##tahap penelusuran path  : FUNGSI (MODEL, pathTo)
        $next = $model;

        // pathTo dari db
        $pathTo=$this->PathToDecode;
        //solusi stdCLass dari json adalah, setiap ada array asosiatif pemanggilan mengunakan objek


        foreach($pathTo as $path=>$isi)
        {

            $jenis=explode("0",$path)[1];
            $pth=explode("0",$path)[0];


            if($jenis==1)
            {
                //kolom/tabel
                // path04 ----> pivot
                $next=$next->$pth;

            }
            elseif($jenis==2)
            {
                // kolom with kondisi, kolom tpi fungsi (matakuliah())
                // fungsi 0 parameter (get(),first(),count())
                $next=$next->$pth();
            }
            elseif($jenis==31)
            {
                $next=$next->$pth($isi[0]);

                // // fungsi 1 parameter
                // if($pth=="sum")
                //                 // sum(column)
            }
            elseif($jenis==32)
            {
                $next=$next->$pth($isi[0],$isi[1]);

                // // fungsi 2 parameter
                // if($pth=="where")
                //     $next=$next->$pth($isi->column,$isi->value);// where(column,value),
                // elseif($pth=="orderBy")
                //     $next=$next->$pth($isi->column,$isi->arah);// orderBy('column', 'arah')

                //elseif("wherein") dst...
                // else dd('notfound'); //tdk masalah ba notfound.. kan cuma ba query bukan b simpan
            }
            elseif($jenis==33)
            {
                $next=$next->$pth($isi[0],$isi[1],$isi[2]);

                // fungsi 3 parameter
                // if($pth=="where")
                //     $next=$next->$pth($isi->column,$isi->operator,$isi->value);//( where(kolom,==,value),  )

                //elseif("wherein") dst...
                // else dd('notfound');
            }



            //hentikan jika ditemukan null
            if($next==null) return null;

        }



        if($jenis_kriteria=='non angka'){
            $next=$rasio[$next];
        }



        return $next;
    }









}
