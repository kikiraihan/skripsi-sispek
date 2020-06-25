<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Phpsimple\HtmlDomParser;
use Hash;
use Carbon\Carbon;

use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Matakuliah;

class ImportController extends Controller
{
    // use HtmlDomParser;

    //byk transkrip
    public function index()
    {
        return view('page.importtranskrip');
    }

    public function posthtml(Request $request)
    {

        $path=$request->file('inihtml')->getRealPath();
        $dom=HtmlDomParser::file_get_html($path);
        $no=0;
        $totalmk=0;

        //pisah per center
        foreach($dom->find("center") as $domcenter){
            // echo "<hr>".$no++."<hr>";

            //data mahasiswa
            $data=$domcenter->find("table[width='100%'][border='0']")[0]->find("table[border='0'] > tbody > tr");
            // echo "<table class='kikibeken-mahasiswa'>";
            foreach($data as $dm)
            {
                $pieces = explode(":", $dm->text());
                $datamahasiswa[$pieces[0]]=$pieces[1];
                // echo $dm;
            }
            // echo"</table>";

            //data matakuliah mahasiswa
            // echo "<table class='kikibeken-matakuliah'>";
            $data2=$domcenter->find("table[width='100%'][border='0'].trans > tbody > tr");
            $bykarray=count($data2);
            $iterasi=0;
            foreach($data2 as $dmk)
            {
                //ini tr

                //ambil semua kecuali terakhir
                if(++$iterasi < $bykarray){
                //cek apakah tr > td(ke-0) isinya tidak kosong, (klo kosong itu batas semester, dan info sks)
                    if($dmk->children(0)->text()!="")
                    {
                        $angka=$dmk->children(0)->text()-1;

                        //filter &amp, kewarganegaraan;
                        $mktitle=str_replace('&amp;','&',$dmk->children(1)->text());

                        $datamatakuliah[$angka]['title']=$mktitle;
                        $datamatakuliah[$angka]['kodemk']=$dmk->children(2)->text();
                        $datamatakuliah[$angka]['sks']=$dmk->children(3)->text();
                        $datamatakuliah[$angka]['nilai']=$dmk->children(4)->text();
                        $datamatakuliah[$angka]['bobot']=$dmk->children(5)->text();
                        $datamatakuliah[$angka]['semester']=$dmk->children(7)->text();
                        // echo $dmk
                        ;

                    }
                }
                // ->find("tr > td[colspan='8']")[0]
                // dd($dmk->find("tr > td[colspan='8']")[0]);
            }
            // echo "</table>";

            $datamahasiswa['matakuliah']=$datamatakuliah;
            $import[]=$datamahasiswa;
            // echo "total mk : ".count($datamatakuliah);

            // echo "<pre>";
            // echo var_dump($datamahasiswa);
            // echo"</pre>";

            $angka=0;
            $datamatakuliah=[];
            $datamahasiswa=[];
        }


        $pesan=array_merge(
            $this->importmahasiswa($import),
            $this->importmatakuliah($import),
            $this->importkontrakmk($import)
        );

        return redirect()->back()->with('pesan', $pesan);
        // return view('page.importtranskrip',compact(['pesan']));

    }

    private function importmahasiswa($import)
    {
        $counter=0;

        foreach ($import as $m)
        {
            $cek=Mahasiswa::where('nim', $m["Nomor Induk Mahasiswa"]);
            if($cek->get()->isEmpty())
            {

                $user           =new User;
                $user->username =$m["Nomor Induk Mahasiswa"];
                $user->password =Hash::make($m["Nomor Induk Mahasiswa"]);
                // $user->email;

                $mahasiswa  =new Mahasiswa;
                $mahasiswa->nama        = $m["N a m a"];
                $mahasiswa->nim         = $m["Nomor Induk Mahasiswa"];
                $mahasiswa->prodi       = ucwords($m["Program Studi"]);
                $mahasiswa->angkatan    = $m["Tahun Masuk"];

                $koma = explode(",  ", $m["Tempat dan Tanggal Lahir"]);
                $tempat_lahir=$koma[0];
                $spasi=explode(" ", $koma[1]);

                if($spasi[1]=="JANUARI")$spasi[1]=1;
                elseif($spasi[1]=="FEBRUARI")$spasi[1]=2;
                elseif($spasi[1]=="MARET")$spasi[1]=3;
                elseif($spasi[1]=="APRIL")$spasi[1]=4;
                elseif($spasi[1]=="MEI")$spasi[1]=5;
                elseif($spasi[1]=="JUNI")$spasi[1]=6;
                elseif($spasi[1]=="JULI")$spasi[1]=7;
                elseif($spasi[1]=="AGUSTUS")$spasi[1]=8;
                elseif($spasi[1]=="SEPTEMBER")$spasi[1]=9;
                elseif($spasi[1]=="OKTOBER")$spasi[1]=10;
                elseif($spasi[1]=="NOVEMBER")$spasi[1]=11;
                elseif($spasi[1]=="DESEMBER")$spasi[1]=12;
                else $spasi[1]=1;

                $tgl_lahir          = new Carbon();
                $tgl_lahir->day     = $spasi[0];
                $tgl_lahir->month   = $spasi[1];
                $tgl_lahir->year    = $spasi[2];

                $mahasiswa->tgl_lahir       = $tgl_lahir;
                $mahasiswa->tempat_lahir    = $tempat_lahir;

                $user->save();
                $user->mahasiswa()->save($mahasiswa);

                //deklarasi role
                $user->assignRole('Mahasiswa');

                $counter++;
            }
            //tidak perlu cek perubahan, data dari transkrip tidak boleh diubah.


        }

        $return=[];
        if($counter!=0) $return[]=$counter." mahasiswa ditambahkan";
        return $return;
    }

    private function importmatakuliah($import)
    {
        $counter=0;
        $counterupdate=0;


        foreach ($import as $m)
        {
            foreach ($m['matakuliah'] as $key=> $mk)
            {


                $cek=Matakuliah::where('kodemk', $mk['kodemk'])->where('nama', $mk['title'])->where('sks', $mk['sks']);
                if($cek->get()->isEmpty())
                {
                    $matakuliah=new Matakuliah;
                    $matakuliah->nama=$mk['title'];
                    $matakuliah->sks=$mk['sks'];
                    $matakuliah->kodemk=$mk['kodemk'];
                    // $matakuliah->semester ganjil genap;
                    // $matakuliah->rumpun;
                    $matakuliah->save();
                    $counter++;
                }
                else
                {

                    /*
                    tidak ada lagi perubahan MK,
                    karena setiap perubahan akan disimpan sebagai rekord baru,
                    */

                    // $matakuliah = $cek->first();
                    // if(
                    //     $matakuliah->nama!= $mk['title'] OR
                    //     $matakuliah->sks!=$mk['sks']
                    //     // $matakuliah->kodemk=$mk['kodemk'];
                    //     // $matakuliah->semester!=$mk['semester']
                    //     // $matakuliah->rumpun;
                    // )
                    // {
                    //     // dd([$matakuliah->sks,$mk['sks']]);

                    //     $matakuliah->nama=$mk['title'];
                    //     $matakuliah->sks=$mk['sks'];
                    //     // $matakuliah->kodemk=$mk['kodemk'];
                    //     // $matakuliah->semester ganjil genap;
                    //     // $matakuliah->rumpun;
                    //     $matakuliah->save();
                    //     $counterupdate++;
                    // }

                }
            }
        }

        $return=[];
        if($counter!=0) $return[]=$counter." matakuliah ditambahkan";
        // if($counterupdate!=0) $return[]=$counterupdate." matakuliah diupdate";
        return $return;
    }

    private function importkontrakmk($import)
    {

        $counter=0;
        $counterupdate=0;


        foreach ($import as $m)
        {
            foreach ($m['matakuliah'] as $mk)
            {
                $kodemk=$mk['kodemk'];
                $bobot=$mk['bobot']==''?NULL:$mk['bobot'];
                $nilai=$mk['nilai'];
                $semester=$mk['semester'];

                /*deteksi mk harus spesifik*/
                $matakuliah=Matakuliah::where('kodemk', $mk['kodemk'])->where('nama', $mk['title'])->where('sks', $mk['sks'])->first();
                $mahasiswa=Mahasiswa::where('nim', $m["Nomor Induk Mahasiswa"])->first();

                //cek kontrak
                $matakuliahnya=$mahasiswa->matakuliah()->where('id_matakuliah',$matakuliah->id);
                if($matakuliahnya->get()->isEmpty())
                {
                    $mahasiswa->matakuliah()->attach($matakuliah->id, [
                        'angka_mutu' => $bobot,
                        'nilai_mutu' => $nilai,
                        'semester' => $semester,
                    ]);
                    $counter++;
                }
                else
                {

                    //cek angka_mutu dan nilai_mutu apa berubah?
                    if($bobot != $matakuliahnya->first()->pivot->angka_mutu)
                    {
                        $matakuliahnya->updateExistingPivot($matakuliah->id,
                        [
                            'angka_mutu' => $bobot,
                        ]);

                        $counterupdate++;

                    }
                    elseif($nilai != $matakuliahnya->first()->pivot->nilai_mutu)
                    {
                        $matakuliahnya->updateExistingPivot($matakuliah->id,
                        [
                            'nilai_mutu' => $nilai,
                        ]);

                        $counterupdate++;
                    }
                    elseif($semester != $matakuliahnya->first()->pivot->semester)
                    {
                        $matakuliahnya->updateExistingPivot($matakuliah->id,
                        [
                            'semester' => $semester,
                        ]);

                        $counterupdate++;
                    }

                }




            }
        }


        $return=[];
        if($counter!=0) $return[]=$counter." kontrak matakuliah ditambahkan";
        if($counterupdate!=0) $return[]=$counterupdate." kontrak matakuliah diupdate";
        return $return;

    }
















}
