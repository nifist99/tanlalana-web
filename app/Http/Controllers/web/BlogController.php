<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ArtikelCollection;
use App\Models\Artikel;
use App\Models\KategoriArtikel;
use App\Models\Komentar;
use App\Models\SubKomentar;
use App\Models\Contact;
use App\Models\Download;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class BlogController extends Controller
{
    use SEOToolsTrait;
    public function index(){

        $data['link']='home';
        $data['list']=Artikel::listData();
        $data['new']=Artikel::listNew();

        $this->seo()->setTitle('Home');
        $this->seo()->setDescription('Artikel Mengenai Crypto dan fintech');
        $this->seo()->opengraph()->setUrl('http://tanlalana.com');
        $this->seo()->opengraph()->addProperty('type', 'artikel');
        $this->seo()->twitter()->setSite('@gomugoomuno');
        $this->seo()->jsonLd()->setType('artikel');

        return view('web.index',$data);
    }

    public function download($id){

        $this->seo()->setTitle('Download');
        $this->seo()->setDescription('Artikel Mengenai Crypto dan fintech');
        $this->seo()->opengraph()->setUrl('http://tanlalana.com');
        $this->seo()->opengraph()->addProperty('type', 'download');
        $this->seo()->twitter()->setSite('@gomugoomuno');
        $this->seo()->jsonLd()->setType('download');

        $data['link']='home';
        $data['row']=Artikel::detailData(Crypt::decryptString($id));
        $data['list']=Download::listAllDownload(Crypt::decryptString($id));
        return view('web.download',$data);
    }

    public function indexByCategory($id){

        $this->seo()->setTitle('By Category');
        $this->seo()->setDescription('Artikel Mengenai Crypto dan fintech');
        $this->seo()->opengraph()->setUrl('http://tanlalana.com');
        $this->seo()->opengraph()->addProperty('type', 'By Category');
        $this->seo()->twitter()->setSite('@gomugoomuno');
        $this->seo()->jsonLd()->setType('By Category');

        $data['link']='home';
        $data['list']=Artikel::listByCategory(Crypt::decryptString($id));
        $data['new']=Artikel::listNew();
        return view('web.index',$data);
    }

    public function search(Request $request){

        $request->validate([
            'judul' => 'required',
        ]);

        $this->seo()->setTitle('Seacrh');
        $this->seo()->setDescription('Artikel Mengenai Crypto dan fintech');
        $this->seo()->opengraph()->setUrl('http://tanlalana.com');
        $this->seo()->opengraph()->addProperty('type', 'search');
        $this->seo()->twitter()->setSite('@gomugoomuno');
        $this->seo()->jsonLd()->setType('search');

        $data['link']='home';
        $data['list']=Artikel::search($request->judul);
        $data['new']=Artikel::listNew();
        return view('web.index',$data);
    }

    public function contact(){

        $data['link']='contact';

        $this->seo()->setTitle('Contact');
        $this->seo()->setDescription('Silahkan Hubungi Kami');
        $this->seo()->opengraph()->setUrl('http://tanlalana.com/contact');
        $this->seo()->opengraph()->addProperty('type','contact');
        $this->seo()->twitter()->setSite('@gomugoomuno');
        $this->seo()->jsonLd()->setType('contact');

        return view('web.contact',$data);
    }

    public function category(){
        $data['list']=KategoriArtikel::listKategori();
        $data['link']='category';

        $this->seo()->setTitle('Category');
        $this->seo()->setDescription('Artikel Mengenai Crypto dan fintech');
        $this->seo()->opengraph()->setUrl('http://tanlalana.com/category');
        $this->seo()->opengraph()->addProperty('type','category');
        $this->seo()->twitter()->setSite('@gomugoomuno');
        $this->seo()->jsonLd()->setType('category');

        return view('web.category',$data);
    }

    public function detail($id){
        $data['link']='home';
        $data['row']=Artikel::detailData(Crypt::decryptString($id));

        $this->seo()->setTitle($data['row']['judul']);
        $this->seo()->setDescription('Artikel Mengenai Crypto dan fintech');
        $this->seo()->opengraph()->setUrl('http://tanlalana.com');
        $this->seo()->opengraph()->addProperty('type',$data['row']['kategori_artikel']);
        $this->seo()->twitter()->setSite('@gomugoomuno');
        $this->seo()->jsonLd()->setType($data['row']['kategori_artikel']);

        return view('web.blog-detail',$data);

    }

    public function komentar(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'content' => 'required',
            'id_artikel' => 'required',
        ]);

        $save=Komentar::insertData($request);

        if($save){
            return redirect()->back()->with('message','berhasil menambahkan komentar')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','gagal menambahkan komentar')->with('message_type','primary');
        }
    }

    public function subKomentar(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'content' => 'required',
            'id_artikel' => 'required',
            'id_komentar' => 'required',
        ]);

        $save=SubKomentar::insertData($request);

        if($save){
            return redirect()->back()->with('message','berhasil menambahkan komentar')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','gagal menambahkan komentar')->with('message_type','primary');
        }
    }

    public function insertContact(Request $request){
        $request->validate([
            'name' => 'required|min:3',
            'content' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        $save=Contact::insertData($request);

        if($save){
            return redirect()->back()->with('message','berhasil mengirimkan pesan')->with('message_type','info');
        }else{
            return redirect()->back()->with('message','gagal mengirimkan pesan')->with('message_type','primary');
        }
    }
}
