<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\DomCrawler\Crawler as Domcrawler;
use GuzzleHttp\Client as GuzzleClient;

use Illuminate\Support\Facades\Http;
use App\Traits\Phpsimple\HtmlDomParser;
use Hash;

use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Matakuliah;

class KikiTestController extends Controller
{

    public function index()
    {

    }





    //dibawah ini kode2 tidak terpakai, waktu mencoba webscraping transkrip nilai melalui autentikasi SIAT.
    //dengan menginputkan nim dan password dari mahasiswa. tanpa upaya2 diluar etika pengembangan..

    public function login3()
    {

        //cara lain
        //gabungkan get dan post
        //get ambil xsrf token
        //post buat post dengan header dari xsrf token tsb

        // echo '<iframe width="560" height="315" src="https://kongkong.web.id/login" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        // dd();
        // 'rxP7kRJ4TAcChPrOFS9jiVRGXj34ab45C0uYUvWg';
        // 'rxP7kRJ4TAcChPrOFS9jiVRGXj34ab45C0uYUvWg';
        //sama biarpun direfresh



        $client=new Client();
        $crawler = $client->request('GET', 'http://siat.ung.ac.id/');
        echo $crawler->filter('head')->html();
        echo $crawler->filter('body')->html();
        echo'<script type="text/javascript" src="http://siat.ung.ac.id/inc/js/login.js"></script>';
        echo '<form name="frmLogin" id="frmLogin" action="http://siat.ung.ac.id/login.php" onsubmit="return processLogin(`http://siat.ung.ac.id/login.php`,`http://siat.ung.ac.id`,`frmLogin`,`msg_form_login`,`login_progress`)" novalidate="novalidate">';
        echo $crawler->filter('#frmLogin')->html();
        echo '</form>';
        // dd($crawler->filter('#blok-left')->html());

        // $response = Http::withBasicAuth('taylor@laravel.com', 'secret')->post();
        // $response = Http::post('http://siat.ung.ac.id', [
        //     'name' => 'Steve',
        //     'role' => 'Network Administrator',
        // ]);


    }


    public function login2()
    {
        $client = new \GuzzleHttp\Client();
        $username='531416066';
        $password='AAaa1234';
        $phpsessid_siat='k3f827opnmhsppo40sl2u7bi0l';
        $jar = \GuzzleHttp\Cookie\CookieJar::fromArray(
            [
                // '__cid'=>'QDtoToTaUk%2BuGRLIUNpnK5gt9pY2eOYDCrZleA5tArUeXAKBOT6ZKN%2FDy1OYNaU9zbhYYfHfhba3%2FRWuU08DWrrrzgLu09GZCIWLH4HSiobZhi8R2d8mov%2FGV8yKW%2BCp',
                // '_ga'=>'GA1.3.704316170.1584451520',
                // 'cookielvluser'=>'3',
                'PHPSESSID'=>$phpsessid_siat,
                // 'siat_theme'=>'fatek',
            ],
            'siat.ung.ac.id'
        );

        $response = $client->post('http://siat.ung.ac.id/', [
            'form_params' => [
                'username' => $username,
                'password' => $password,
                'action' => 'login'
            ],
            'cookies' => $jar
        ]
        );

        $xml = $response->getBody()->getContents();
        echo $xml;
    }



    public function tampil()
    {
        return view('testkiki.iframe-siat');
    }




    public function scrap()
    {
        $url="http://siat.ung.ac.id/index.php?mod=lapnilai&cmd=nilai/index&op=view&vtipe=print&vnim=531416066&vnidn=&vnilaidiambil=0&jvfak=05&vnama=&vnilaikosong=1&vnilaierror=1&jvjur=57401&vstatus=&vpenempatansemester=1&jvprodi=57201&vangkatan=2016&vtipetranskrip=0&vjenis=2&vtahun=2020&vsemester=2&vnumrow=";


        $phpsessid_siat='vds0sp56bdcuujt2cco7p47n89';//hidayat
        'vds0sp56bdcuujt2cco7p47n89';//kiki
        //setelah direstart browser(firefox dan chrome) lagi kiki dapat session baru
        'gco5fk8d91oqnmuj51tdpd055o';//kiki
        'gco5fk8d91oqnmuj51tdpd055o';//dayat
        // Fakta
        // Dpe phpsessid tetap sama, meskipun beda user.
        //soalnya pas ada coba logout dayat, login kiki, refresh tampilan langsung menyesuaikan. dpe isi jadi kiki.
        //meskipun login di firefox, baru curl dari chrome,
        // yang penting phpsessid sama dengan yang ada pake ba login akan

        // ini berarti di server bsimpan phpsessid dan akun apa yang terhubung di phpsessid itu
        //cara satu2nya adalah dengan melakukan login di curl atau apa,
        // baru get dpe phpsessid, atasnama org sama tsb yang melakukan login.
        // baru akses transkrip, pake phpsessid yg sama.

        //jadi dapat disimpulkan bahwa setiap browser restart, maka akan berganti session.
        //meskipun kita login dengan akun lain. phpsessid tetap sama.
        //Jadi server menyimpan akun A login dengan phpsessid sama, dan dikenali di server.
        //kesimpulan lain adalah bahwa session itu digenerate oleh browser, karena beda browser, beda phpsessid.
        //meskipun klo so login di firefox, tpi pake phpsessid yg di chrome ttp akan tlogin.
        //'session smntara' yang di generate akan disimpan diserver dan dingat sebagai remember token, dan terhubung dengan user


        $jar = \GuzzleHttp\Cookie\CookieJar::fromArray(
            [
                // '__cid'=>'QDtoToTaUk%2BuGRLIUNpnK5gt9pY2eOYDCrZleA5tArUeXAKBOT6ZKN%2FDy1OYNaU9zbhYYfHfhba3%2FRWuU08DWrrrzgLu09GZCIWLH4HSiobZhi8R2d8mov%2FGV8yKW%2BCp',
                // '_ga'=>'GA1.3.704316170.1584451520',
                // 'cookielvluser'=>'3',
                'PHPSESSID'=>$phpsessid_siat,
                // 'siat_theme'=>'fatek',
            ],
            'siat.ung.ac.id'
        );
        $client=new GuzzleClient();
        $response = $client->request('GET', $url, [
            'cookies' => $jar,
        ]);
        echo $response->getBody()->getContents();
    }

    public function login1()
    {
        $client=new Client();

        $crawler = $client->request('GET', 'http://siat.ung.ac.id/');
        // echo '<iframe width="560" height="315" src="https://www.youtube.com/watch?v=liRrLTu698k/" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        echo $crawler->filter('#blok-left')->html();//#frmLogin
        dd($crawler->filter('#blok-left')->html());
        $crawler = $client->click($crawler->selectLink('Sign in')->link());
        $form = $crawler->selectButton('Sign in')->form();
        $crawler = $client->submit($form, array('login' => 'fabpot', 'password' => 'xxxxxx'));
        $crawler->filter('.flash-error')->each(function ($node) {
            print $node->text()."\n";
        });
    }



}






// public function posthtmlpakedomcrawlser(){
//     // dd($request);

//     $path=$request->file('inihtml')->getRealPath();
//     // echo $path;
//     $myfile=fopen($path,'r');
//     $html=fread($myfile,filesize($path));
//     $crawler = new Domcrawler();
//     $crawler->addHtmlContent($html);


//     $crawler->filter("center")->each(function (Domcrawler $node, $i) {

//             echo "<hr>".$i."<hr>";
//             $node->filter("table[width='100%'][border='0']")->each(function (Domcrawler $nodetr, $i)
//             {
//                 echo $nodetr->html();
//             });
//             $node->filter("table.trans > tbody ")->each(function (Domcrawler $nodetr, $i)
//             {
//                 echo "<table>";
//                 echo $nodetr->html();
//                 echo "</table>";
//             });
//             // echo $node->html();
//     });
//     dd();
//     // foreach ($crawler as $domElement) {
//     //     var_dump($domElement->nodeName);
//     // }

//     // some code has been executed.... so close at the end
//     fclose($myfile);
// }




// public function scrap()
//     {
//         $url="http://siat.ung.ac.id/index.php?mod=lapnilai&cmd=nilai/index&op=view&vtipe=print&vnim=531416066&vnidn=&vnilaidiambil=0&jvfak=05&vnama=&vnilaikosong=1&vnilaierror=1&jvjur=57401&vstatus=&vpenempatansemester=1&jvprodi=57201&vangkatan=2016&vtipetranskrip=0&vjenis=2&vtahun=2020&vsemester=2&vnumrow=";
//         $cookie_siat='k3f827opnmhsppo40sl2u7bi0l';

//         $jar = \GuzzleHttp\Cookie\CookieJar::fromArray(
//             [
//                 // '__cid'=>'QDtoToTaUk%2BuGRLIUNpnK5gt9pY2eOYDCrZleA5tArUeXAKBOT6ZKN%2FDy1OYNaU9zbhYYfHfhba3%2FRWuU08DWrrrzgLu09GZCIWLH4HSiobZhi8R2d8mov%2FGV8yKW%2BCp',
//                 // '_ga'=>'GA1.3.704316170.1584451520',
//                 // 'cookielvluser'=>'3',
//                 'PHPSESSID'=>$cookie_siat,
//                 // 'siat_theme'=>'fatek',
//             ],
//             'siat.ung.ac.id'
//         );
//         $client=new GuzzleClient();
//         $response = $client->request('GET', $url, ['cookies' => $jar]);
//         echo $response->getBody()->getContents();

//         dd();
//         // dd($jar->getCookieByName('_ga'));

//         $cookie = new \Symfony\Component\BrowserKit\Cookie('flavor', 'chocolate');
//         $cookieJar = new \Symfony\Component\BrowserKit\CookieJar();
//         $cookieJar->set($cookie);
//         $client = new Client([], null, $cookieJar);;

//         dd($client->getCookieJar());
//         // $client = new Client();
//         // $client = new Client(HttpClient::create(['timeout' => 60]));
//         $url="http://siat.ung.ac.id/index.php?mod=lapnilai&cmd=nilai/index&op=view&vtipe=print&vnim=531416066&vnidn=&vnilaidiambil=0&jvfak=05&vnama=&vnilaikosong=1&vnilaierror=1&jvjur=57401&vstatus=&vpenempatansemester=1&jvprodi=57201&vangkatan=2016&vtipetranskrip=0&vjenis=2&vtahun=2020&vsemester=2&vnumrow=";

//         // $jar = \GuzzleHttp\Cookie\CookieJar::fromArray(
//         //     [
//         //         '_ga'=>'GA1.3.704316170.1584451520',
//         //         'cookielvluser'=>'3',
//         //         'PHPSESSID'=>'3f827opnmhsppo40sl2u7bi0l',
//         //         'siat_theme'=>'fatek',
//         //     ],
//         //     'siat.ung.ac.id'
//         // );
//         // $client->getCookieJar()->set(new Symfony\Component\BrowserKit\Cookie(
//         //     'Trade', "PageNumber=5"
//         // ));
//         $r = $client->request('GET', $url);
//         dd($client->getCookieJar());
//         // $response=$client->request(
//         //     'GET',
//         //     $url
//         // );

//         // $response->getStatusCode();
//         // dd($response->getBody()->getContents());


//         // GOUTTE
//         // $crawler = $client->request('GET', $url);
//         // $client->getCookieJar()->set(new Cookie('Trade', "PageNumber=5"));
//         // // $cookieJar->set($cookie);
//         // dd($cookieJar->all());
//         // // Get the latest post in this category and display the titles
//         // $crawler->filter('')->each(function ($node) {
//         //     print $node->text()."\n";
//         // });

//         //facebook jadi
//         // $crawler = $client->request('GET', 'https://www.facebook.com/astro.raihan');
//         // $crawler->filter('._2nlw')->each(function ($node) {
//         //     print $node->text()."\n";
//         // });



//         //GOUTTE login
//         // $crawler = $client->request('GET', 'http://siat.ung.ac.id/');
//         // // $crawler->filter('')->each(function ($node) {
//         // //     print $node->text()."\n";
//         // // });
//         // // $crawler = $client->click($crawler->selectLink('Sign in')->link());
//         // $form = $crawler->selectButton('Login')->form();
//         // $crawler = $client->submit($form, array(
//         //     'lgUserLevel' => '3',
//         //     'lgUserName' => '531416066',
//         //     'lgPassword' => 'AAaa1234',
//         //     // 'lg_gfx_check' => 'lg_gfx',

//         // ));
//         // $crawler->filter('.flash-error')->each(function ($node) {
//         //     print $node->text()."\n";
//         // });

//     }