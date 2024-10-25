<?php

namespace App\Http\Controllers\FrontPages;

use App\Http\Controllers\Controller;
use App\Http\Utils\AnalisisPengunjung;
use App\Http\Utils\Meta;
use App\Models\BlogNews;
use App\Models\BrandProduk;
use App\Models\CompanyHistory;
use App\Models\CompanyInfo;
use App\Models\DownloadCenter;
use App\Models\KategoriProduk;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Servis;
use App\Models\StaticPages;
use App\Models\WhyChooseUs;
use App\Models\Customer;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Inertia\Inertia;

class FrontPagesControlller extends Controller
{
    // Home Pages
    public function index1()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $sliders = Slider::where('slider_product', 0)->get(['slider_title', 'slider_image']);
        // dd($sliders);
        $intro = StaticPages::where('id', 1)->get(['title', 'content']);
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $history = CompanyHistory::get(['tahun', 'descripiton'])->take(4);
        $wCu = WhyChooseUs::get(['content']);
        $katProduk = KategoriProduk::get(['nama_kategori', 'slugs', 'gambar_produk']);
        $news = BlogNews::orderBy('id', 'DESC')->get(['title', 'slug', 'image', 'content', 'created_at'])->take(2);
        $downlaodCenter = DownloadCenter::get(['title', 'file_dokumen', 'desc']);
        $customer = Customer::get(['customer_logo', 'customer_name']);

        $customers = Customer::select('customer_logo', 'customer_name', 'type')->get();

        $groupedCustomers = $customers->groupBy('type');

        $pharmaceuticalCustomers = $groupedCustomers->get('Pharmaceutical', collect());
        $personalCareCustomers = $groupedCustomers->get('Personal care', collect());
        $foodBeverageCustomers = $groupedCustomers->get('food&beverage', collect());
        $generalIndustryCustomers = $groupedCustomers->get('General Industry', collect());

        // dd($intro);
        $meta = new Meta($companyInfo[0]->company_name . ' - ' . Meta::$titleKey, ' ' . $companyInfo[0]->company_slogan . ', Supplier water equipment di Indonesia, Distributor cobetter di indonesia, Distributor veolia di indonesia, Catridge filter di indonesia,RO membrane di indonesia', '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('index', [
            'customers' => [
                'pharmaceutical' => $pharmaceuticalCustomers,
                'personalCareCustomers' => $personalCareCustomers,
                'foodBeverageCustomers' => $foodBeverageCustomers,
                'generalIndustryCustomers' => $generalIndustryCustomers
            ],
            'groupedCustomers' => $groupedCustomers,
            'customer' => $customer,
            'companyInfo' => $companyInfo[0],
            'sliders' => $sliders,
            'title' => Meta::getTitle(),
            'intro' => $intro[0],
            'brand' => $brand,
            'brandDesc' => $brandDesc[0],
            'history' => $history,
            'wCu' => $wCu,
            'katProduk' => $katProduk,
            'news' => $news,
            'downlaodCenter' => $downlaodCenter
        ]);
        // return Inertia::render('FrontPages/LandingPages', ['companyInfo' => $companyInfo[0]]);
    }

    // brands authroized
    public function brand($slug = null)
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',])->first();
        // $pagesDetail = StaticPages::where('id', 4)->get(['title', 'content', 'image']);
        $brandDetail = BrandProduk::where('slugs', $slug)->get(['id', 'nama_brand', 'deskripsi_brand', 'gambar_brand'])->first();
        $produk = Produk::where('id_brand', $brandDetail->id)->with('imagesProduk')->paginate(10);
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $meta = new Meta($brandDetail->nama_brand, strip_tags(Str::limit($brandDetail->deskripsi_brand, 290, '.')), '/storage/img/company/' . $companyInfo->company_logo);
        return view('brand', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo, 'brandDetail' => $brandDetail, 'title' => Meta::getTitle(), 'produk' => $produk]);
    }


    // Produk and Servis Pages
    public function produkPages()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone']);
        $sliders = Slider::where('slider_product', 1)->get(['slider_title', 'slider_image']);
        $katProduk = KategoriProduk::get(['id', 'nama_kategori', 'slugs', 'gambar_produk']);
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $Produk = Produk::with(['kategoriProduk', 'brandProduk', 'imagesProduk'])->orderBy('id', 'desc')->paginate(8);
        $meta = new Meta('Products' . ' - ' . $companyInfo[0]->company_name, 'Product By PT. Cipta Aneka Air, Veolia Membrane RO, Cobetter Filter, Cartridge Filter, Chemical For Water Treatment, Filteration Media', '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.produk.produk', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'sliders' => $sliders, 'title' => Meta::getTitle()], compact('katProduk', 'Produk'));
    }

    // Produk Detail Pages
    public function produkDetailsPages($slugs = null)
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $produk = Produk::where('slugs', $slugs)->with(['kategoriProduk', 'brandProduk', 'imagesProduk'])->first();
        $D_id_kategori = $produk->id_kategori;
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $pdserupa = Produk::where('id_kategori', $D_id_kategori)->with(['kategoriProduk', 'brandProduk', 'imagesProduk'])->get();
        $meta = new Meta(Str::title($produk->nama_produk), Str::limit($produk->deskripsi_produk, 290, '.'), '/storage/img/produk/' . $produk->imagesProduk[0]->gambar_produk);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.produk.produk-detail', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'title' => Meta::getTitle(), 'produk' => $produk], compact('pdserupa'));
    }


    // Produk By Ketegori
    public function produkByKategori($slugs)
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $kategoriProduk = KategoriProduk::where('slugs', $slugs)->first();
        // $kategoriProduk = KategoriProduk::where('slugs', $slugs)->with(['produk'])->first();
        $DkategoriProduk = KategoriProduk::get();
        $D_id_kategori = $kategoriProduk->id;
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $produk = Produk::where('id_kategori', $D_id_kategori)->with(['kategoriProduk', 'brandProduk', 'imagesProduk'])->paginate(8);
        $meta = new Meta('Distributor ' . $kategoriProduk->nama_kategori . ' di Indonesia - PT. Cipta Aneka Air',  Str::limit($kategoriProduk->deskripsi_kategori, 250, '.'), '/storage/img/kategori-produk/' . $kategoriProduk->gambar_produk);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.produk.produk-by-kategori', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'title' => Meta::getTitle(), 'kategoriProduk' => $kategoriProduk], compact('DkategoriProduk', 'produk'));
    }

    // Produk By Brand
    public function produkByBrand($slugs)
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $brandProduk = BrandProduk::where('slugs', $slugs)->with(['produk'])->first();
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $meta = new Meta($brandProduk->nama_brand, Str::limit($brandProduk->deskripsi_brand, 250, '.'), '/storage/img/brand-produk/' . $brandProduk->gambar_brand);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.produk.produk-by-brand', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'title' => Meta::getTitle(), 'brandProduk' => $brandProduk]);
    }

    // Servis Pages
    public function servisPages()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $servis = Servis::get(['judul_servis', 'slug', 'gambar_servis', 'deskripsi_servis']);
        $meta = new Meta('Servis' . ' - ', 'Servis dan Layanan Pengolahan Air Bersih dan Air Limbah', '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.servis.servis', ['companyInfo' => $companyInfo[0], 'servis' => $servis, 'title' => Meta::getTitle()]);
    }

    // Servis Detail Ppages
    public function servisDetailPages($slugs)
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $servis = Servis::where('slug', $slugs)->first();
        $meta = new Meta($servis->judul_servis, Str::limit(strip_tags($servis->deskripsi_servis), 250, '.'), '/storage/img/servis/' . $servis->gambar_servis);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.servis.servis-detail', ['companyInfo' => $companyInfo[0], 'title' => Meta::getTitle(), 'servis' => $servis]);
    }

    // News Pages
    public function newsPages()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        // $servis = Servis::get(['judul_servis', 'slug', 'gambar_servis', 'deskripsi_servis']);
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $news = BlogNews::select(["title", "slug", "content", "image"])->paginate(6);
        $meta = new Meta('News ' . ' - Update and Info ' . $companyInfo[0]->company_name, 'News & Update By' . $companyInfo[0]->company_name . ' ' . $companyInfo[0]->company_slogan, '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.news-info.news', ['brand' => $brand, 'news' => $news, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'title' => Meta::getTitle()]);
    }

    // news Detail
    public function newssDetailPages($slugs)
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $news = BlogNews::where('slug', $slugs)->first();
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $meta = new Meta(Str::limit($news->title, 63, '..'), Str::limit(strip_tags($news->content), 250, '.'), '/storage/img/blog-news/' . $news->image);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.news-info.news-detail', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'title' => Meta::getTitle(), 'news' => $news]);
    }

    // Tentang kami
    public function about()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $tentangData = StaticPages::find(5);
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $intro = StaticPages::where('id', 1)->get(['title', 'content'])->first();
        $meta = new Meta('About Us ' . ' - ' . $companyInfo[0]->company_name, strip_tags(Str::limit($brandDesc[0]->content, 315, '..')), '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.about.tentang-kami', ['intro' => $intro, 'companyInfo' => $companyInfo[0], 'tentangData' => $tentangData, 'brand' => $brand, 'brandDesc' => $brandDesc[0],  'title' => Meta::getTitle()]);
    }

    // history
    public function history()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $tentangData = StaticPages::find(5);
        $companyHistory = CompanyHistory::get(['tahun', 'descripiton'])->take(4);
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $meta = new Meta('History of ' . $companyInfo[0]->company_name,  'The journey of PT. Cipta Aneka Air since 2008 until now has been a journey filled with struggles and problem-solving in the field of water treatment and maintenance.', '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.about.history', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'companyHistory' => $companyHistory, 'tentangData' => $tentangData,  'title' => Meta::getTitle()]);
    }

    // visimisi
    public function visimisi()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $tentangData = StaticPages::find(5);
        $visi = StaticPages::where('id', 6)->get(['title', 'content']);
        $misi = StaticPages::where('id', 7)->get(['title', 'content']);
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $meta = new Meta('About Us ' . ' - Vision & Mission ' . $companyInfo[0]->company_name, 'About Us ' . ' - Vision & Mission - ' .  $companyInfo[0]->company_name, '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.about.visimisi', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'tentangData' => $tentangData,  'title' => Meta::getTitle(), 'visi' => $visi[0], 'misi' => $misi[0]]);
    }

    // whoweare
    public function whoweare()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $tentangData = StaticPages::find(5);
        $content =  StaticPages::where('id', 8)->get(['title', 'content']);
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $meta = new Meta('About Us ' . ' - Who We Are ' .  $companyInfo[0]->company_name, 'Who We Are - ' .  $companyInfo[0]->company_name, '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.about.who-we-are', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'tentangData' => $tentangData,  'title' => Meta::getTitle(), 'content' => $content[0]]);
    }

    // project
    public function projects()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $tentangData = StaticPages::find(5);
        $Customer = Customer::get();
        $Project = Project::get();
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $meta = new Meta('Projects ' . ' - Handle By ' . $companyInfo[0]->company_name, 'Tentang - ' .  $companyInfo[0]->company_name, '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.projects.index', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'tentangData' => $tentangData,  'title' => Meta::getTitle()], compact('Customer', 'Project'));
    }

    public function hiring()
    {
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone',]);
        $tentangData = StaticPages::find(5);
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $meta = new Meta('We Are Hiring ' . ' - ' . $companyInfo[0]->company_name, 'Open Position On  - ' .  $companyInfo[0]->company_name, '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.hiring.index', ['brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'tentangData' => $tentangData,  'title' => Meta::getTitle()]);
    }

    // search product
    public function searchProduct(Request $request)
    {
        $dataSearch = $request->input("product-search");
        $Produk = Produk::where('nama_produk', 'like', "%{$dataSearch}%")->paginate(8);
        $companyInfo = CompanyInfo::where('id', 1)->get(['company_name', 'company_slogan', 'company_logo', 'company_address', 'company_email', 'company_phone']);
        $brand = BrandProduk::get(['slugs', 'gambar_brand'])->take(5);
        $brandDesc = StaticPages::where('id', 2)->get(['title', 'content']);
        $meta = new Meta('Search Product' . ' - ' . $dataSearch, 'Produk Pengolahan Air Bersih dan Air Limbah', '/storage/img/company/' . $companyInfo[0]->company_logo);
        AnalisisPengunjung::recordVisitor($_SERVER['REMOTE_ADDR'], $_SERVER['HTTP_USER_AGENT'], url()->current());
        return view('pages.produk.produk-by-search', ['Produk' => $Produk, 'brand' => $brand, 'brandDesc' => $brandDesc[0], 'companyInfo' => $companyInfo[0], 'searchData' => $dataSearch, 'title' => Meta::getTitle()]);
    }
}
