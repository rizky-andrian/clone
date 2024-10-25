<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Charts\VisitorCharts;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Data\KonfigurasiDataController;
use App\Http\Controllers\Data\MasterDataController;
use App\Models\AnalisisPengunjung;
use App\Models\BlogNews;
use Inertia\Inertia;
use App\Models\Produk;
use App\Models\KategoriProduk;
use App\Models\BrandProduk;
use App\Models\CompanyHistory;
use App\Models\CompanyInfo;
use App\Models\Customer;
use App\Models\DownloadCenter;
use App\Models\PanelUtama;
use App\Models\Project;
use App\Models\Servis;
use App\Models\Slider;
use App\Models\Sosmed;
use App\Models\StaticPages;
use App\Models\WhyChooseUs;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // index function dashboardw
    public function index(VisitorCharts $chart)
    {
        $analytics = DB::table('analisis_pengunjung')->distinct()->count('ip_address');
        $produk = DB::table('produks')->count();
        $servis = DB::table('servis')->count();
        $blog = DB::table('blog_news')->count();
        $visitorList = DB::table('analisis_pengunjung')->select(DB::raw('DISTINCT url, COUNT(*) AS total_pengunjung'))->groupBy('url')->orderBy('total_pengunjung', 'DESC')->get();
        return Inertia::render('Dashboard/Index', ['chart' => $chart->build(), 'visitor' => $analytics, 'produk' => $produk, 'servis' => $servis, 'blog' => $blog, 'visitorList' => $visitorList]);
    }

    // master function dashboard
    public function masterPages()
    {
        return Inertia::render('Dashboard/Master/Index');
    }

    // master produk
    public function masterProduk()
    {
        return Inertia::render('Dashboard/Master/Produk/Index', ['produk' => MasterDataController::ambilSemuaData(new Produk(), ['kategoriProduk', 'brandProduk', 'imagesProduk']), 'kategoriProduk' => MasterDataController::ambilSemuaData(new KategoriProduk()), 'brandProduk' => MasterDataController::ambilSemuaData(new BrandProduk()),]);
    }

    // master kategori produk
    public function kategoriProduk()
    {
        return Inertia::render('Dashboard/Master/Produk/Kategori/Index', ['produk' => MasterDataController::ambilSemuaData(new KategoriProduk()), 'message' => null]);
    }

    // master brand produk
    public function brandProduk()
    {
        return Inertia::render('Dashboard/Master/Produk/Brand/Index', ['produk' => MasterDataController::ambilSemuaData(new BrandProduk()), 'message' => null]);
    }

    // master servis
    public function masterServis()
    {
        return Inertia::render('Dashboard/Master/Servis/Index', ['servis' => MasterDataController::ambilSemuaData(new Servis()), 'message' => null]);
    }

    // company
    public function masterCompany()
    {
        return Inertia::render('Dashboard/Master/Company/Index', ['servis' => MasterDataController::ambilSemuaData(new Servis()), 'message' => null]);
    }

    // customer
    public function masterCustomer()
    {
        return Inertia::render('Dashboard/Master/Customer/Index', ['customer' => MasterDataController::ambilSemuaData(new Customer()), 'message' => null]);
    }

    // konfigurasi pages
    public function konfigurasiPages()
    {
        return Inertia::render('Dashboard/Konfigurasi/Index');
    }

    // company konfigurasi
    public function konfigurasiCompany()
    {
        return Inertia::render('Dashboard/Konfigurasi/Company/Index', ['data' => KonfigurasiDataController::ambilDataTunggal(new CompanyInfo()), 'message' => null]);
    }

    // static pages
    public function staticPages()
    {
        return Inertia::render('Dashboard/Pages/Index', ['data' => MasterDataController::ambilSemuaData(new StaticPages()), 'message' => null]);
    }

    // blog and news
    public function blogPages()
    {
        return Inertia::render('Dashboard/BlogNews/Index', ['data' => MasterDataController::ambilSemuaData(new BlogNews()), 'message' => null]);
    }

    // sosmed
    public function sosmedPages()
    {
        return Inertia::render('Dashboard/Master/Sosmed/Index', ['data' => MasterDataController::ambilSemuaData(new Sosmed()), 'message' => null]);
    }

    // profile
    public function profilePages()
    {
        return Inertia::render('Dashboard/Profile/Index', ['data' => KonfigurasiDataController::ambilDataTunggal(null, [], Auth::user()), 'message' => null]);
    }

    // slider
    public function sliderPages()
    {
        return Inertia::render('Dashboard/Master/Slider/Index', ['data' => MasterDataController::ambilSemuaData(new Slider()), 'message' => null]);
    }

    // panel utama
    public function panelUtama()
    {
        return Inertia::render('Dashboard/Master/PanelUtama/Index', ['data' => MasterDataController::ambilSemuaData(new PanelUtama()), 'message' => null]);
    }

    // get anayltics data
    public function getAnalyticsData()
    {
        $analytics = DB::statement('SELECT count(distinct ip_address) from analisis_pengunjung;');
        return response()->json($analytics, 200);
    }

    // history pages
    public function historyPage()
    {
        return Inertia::render('Dashboard/Master/History/Index', ['data' => MasterDataController::ambilSemuaData(new CompanyHistory()), 'message' => null]);
    }

    // why choose us
    public function wcuPage()
    {
        return Inertia::render('Dashboard/Master/Wcu/Index', ['data' => MasterDataController::ambilSemuaData(new WhyChooseUs()), 'message' => null]);
    }

    // download center
    public function downloadPage()
    {
        return Inertia::render('Dashboard/Master/DownloadCenter/Index', ['data' => MasterDataController::ambilSemuaData(new DownloadCenter()), 'message' => null]);
    }

    // project
    public function projectPage()
    {
        return Inertia::render('Dashboard/Master/Project/Index', ['data' => MasterDataController::ambilSemuaData(new Project(), ['customer']), 'customer' => MasterDataController::ambilSemuaData(new Customer()), 'message' => null]);
    }
}
