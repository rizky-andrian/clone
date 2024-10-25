<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Data\KonfigurasiDataController;
use App\Http\Controllers\Data\MasterDataController;
use App\Http\Controllers\FrontPages\FrontPagesControlller;
use Illuminate\Support\Facades\Route;
use App\Models\AnalisisPengunjung;
use Illuminate\Support\Facades\DB;

// auth route
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout']);


// end auth route

// dashboard
Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);

    Route::post('/user/{id}', [AuthController::class, 'updateProfile']);

    // Route View and Get Data
    Route::prefix('/master')->group(function () {
        Route::get('/', [DashboardController::class, 'masterPages']);
        Route::prefix('/produk')->group(function () {
            Route::get('/', [DashboardController::class, 'masterProduk']);
            // Katgeori Produk
            Route::prefix('/kategori')->group(function () {
                Route::get('/', [DashboardController::class, 'kategoriProduk']);
            });
            // Brand Produk
            Route::prefix('/brand')->group(function () {
                Route::get('/', [DashboardController::class, 'brandProduk']);
            });
        });
        // Sosmed
        Route::prefix('/sosmed')->group(function () {
            Route::get('/', [DashboardController::class, 'sosmedPages']);
        });
        // Servis
        Route::prefix('/servis')->group(function () {
            Route::get('/', [DashboardController::class, 'masterServis']);
        });
        // Customer
        Route::prefix('/customer')->group(function () {
            Route::get('/', [DashboardController::class, 'masterCustomer']);
        });
        // Sliders
        Route::get('/slider', [DashboardController::class, 'sliderPages']);

        // Panel Utama
        Route::get('/panel-utama', [DashboardController::class, 'panelUtama']);

        // History
        Route::prefix('/history')->group(function () {
            Route::get('/', [DashboardController::class, 'historyPage']);
        });

        // Why Choose Us
        Route::prefix('/why-choose-us')->group(function () {
            Route::get('/', [DashboardController::class, 'wcuPage']);
        });

        // download center
        Route::prefix('/download-center')->group(function () {
            Route::get('/', [DashboardController::class, 'downloadPage']);
        });

        // projects
        Route::prefix('/projects')->group(function () {
            Route::get('/', [DashboardController::class, 'projectPage']);
        });
    });


    Route::prefix('/konfigurasi')->group(function () {
        Route::get('/', [DashboardController::class, 'konfigurasiPages']);
        Route::get('/company', [DashboardController::class, 'konfigurasiCompany']);
    });

    Route::prefix('/pages')->group(function () {
        Route::get('/', [DashboardController::class, 'staticPages']);
    });

    Route::get('blog-news', [DashboardController::class, 'blogPages']);

    // profile
    Route::get('profile', [DashboardController::class, 'profilePages']);



    // Ruote Action
    Route::prefix('/master')->group(function () {
        Route::prefix('/produk')->group(function () {
            // Kategori Produk
            Route::post('/create-kategori-produk', [MasterDataController::class, 'createKategoriData']);
            Route::post('/delete-kategori-produk', [MasterDataController::class, 'deleteKategoriData']);
            Route::post('/update-kategori-data/{id}', [MasterDataController::class, 'updateDataKategoriData']);
            Route::delete('/delete-kategori/{id}', [MasterDataController::class, 'deleteSingleKategoriData']);

            // Brand Produk
            Route::post('/create-brand-produk', [MasterDataController::class, 'createBrandData']);
            Route::post('/delete-brand-produk', [MasterDataController::class, 'deleteBrandData']);
            Route::post('/update-brand-data/{id}', [MasterDataController::class, 'updateDataBrandData']);
            Route::delete('/delete-brand/{id}', [MasterDataController::class, 'deleteSingleBrandData']);

            // Produk
            Route::post('/create-produk', [MasterDataController::class, 'createProdukData']);
            Route::post('/update-produk/{id}', [MasterDataController::class, 'updateProdukData']);
            Route::post('/delete-multi-produk', [MasterDataController::class, 'deleteMultipleProdukData']);
            Route::delete('/delete-produk/{id}', [MasterDataController::class, 'deleteProduk']);
            // Delete Images Produk
            Route::delete('/delete-images-produk/{id}', [MasterDataController::class, 'deleteImagesProduk']);
        });

        Route::prefix('/history')->group(function () {
            Route::post('/create', [MasterDataController::class, 'createHistory']);
            Route::post('/update/{id}', [MasterDataController::class, 'updateHistory']);
        });

        Route::prefix('/project')->group(function () {
            Route::post('/create', [MasterDataController::class, 'createProject']);
            Route::post('/update/{id}', [MasterDataController::class, 'updateProject']);
            Route::delete('/delete/{id}', [MasterDataController::class, 'deleteProject']);
        });

        Route::prefix('/why-choose-us')->group(function () {
            Route::post('/create', [MasterDataController::class, 'createWcu']);
            Route::post('/update/{id}', [MasterDataController::class, 'updateWcu']);
        });

        Route::prefix('/servis')->group(function () {
            // Create Servis Data
            Route::post('/create-servis', [MasterDataController::class, 'createServisData']);
            Route::post('/update-servis/{id}', [MasterDataController::class, 'updateServisData']);
            Route::post('/delete-multi-servis', [MasterDataController::class, 'deleteMultipleServisData']);
            Route::delete('/delete-servis/{id}', [MasterDataController::class, 'deleteServisData']);
        });

        Route::prefix('/company')->group(function () {
            // Create Servis Data
            Route::post('/create-servis', [MasterDataController::class, 'createServisData']);
            Route::post('/update-servis/{id}', [MasterDataController::class, 'updateServisData']);
            Route::post('/delete-multi-servis', [MasterDataController::class, 'deleteMultipleServisData']);
            Route::delete('/delete-servis/{id}', [MasterDataController::class, 'deleteServisData']);
        });

        Route::prefix('/customer')->group(function () {
            // Create Servis Data
            Route::post('/create-customer', [MasterDataController::class, 'createCustomerData']);
            Route::post('/update-customer/{id}', [MasterDataController::class, 'updateCustomerData']);
            Route::post('/delete-multi-customer', [MasterDataController::class, 'deleteMultipleCustomerData']);
            Route::delete('/delete-customer/{id}', [MasterDataController::class, 'deleteCustomerData']);
        });
        Route::prefix('/sosmed')->group(function () {
            // Create Sosmed Data
            Route::post('/create-sosmed', [MasterDataController::class, 'createSosmed']);
            Route::post('/update-sosmed/{id}', [MasterDataController::class, 'updateSosmed']);
            Route::delete('/delete-sosmed/{id}', [MasterDataController::class, 'deleteSosmed']);
        });

        Route::prefix('/slider')->group(function () {
            // Create Slider Data
            Route::post('/create-slider', [MasterDataController::class, 'createSlider']);
            Route::post('/update-slider/{id}', [MasterDataController::class, 'updateSlider']);
            Route::delete('/delete-slider/{id}', [MasterDataController::class, 'deleteSlider']);
        });

        Route::prefix('/panel-utama')->group(function () {
            Route::post('/create-panel', [MasterDataController::class, 'createPanelUtama']);
            Route::post('/update-panel/{id}', [MasterDataController::class, 'updatePanelUtama']);
            Route::delete('/delete-panel/{id}', [MasterDataController::class, 'deletePanel']);
        });

        // dokumen
        Route::prefix('/dokumen')->group(function () {
            Route::post('/create', [MasterDataController::class, 'createDokumen']);
            Route::post('/update/{id}', [MasterDataController::class, 'updateDokumen']);
        });
    });


    Route::prefix('/konfigurasi')->group(function () {
        Route::post('/update', [KonfigurasiDataController::class, 'updateCompanyInfo']);
    });

    Route::prefix('/static-content')->group(function () {
        Route::post('/create-data', [MasterDataController::class, 'createStaticPages']);
        Route::post('/update-data/{id}', [MasterDataController::class, 'updateStaticPages']);
        Route::delete('/delete-data/{id}', [MasterDataController::class, 'deleteStaticData']);
    });
    Route::prefix('/blog-news')->group(function () {
        Route::post('/create-data', [MasterDataController::class, 'createBlogNews']);
        Route::post('/update-data/{id}', [MasterDataController::class, 'updateBlogNews']);
        Route::delete('/delete-data/{id}', [MasterDataController::class, 'deleteBlogNews']);
    });
});


// Front Pages Routes
Route::get('/', [FrontPagesControlller::class, 'index1'])->name('index');
// Route::get('/home1', [FrontPagesControlller::class, 'index1'])->name('index1');
Route::get('/about-us', [FrontPagesControlller::class, 'about']);
Route::get('/about-us/our-history', [FrontPagesControlller::class, 'history']);
Route::get('/about-us/vision-mission', [FrontPagesControlller::class, 'visimisi']);
Route::get('/about-us/who-we-are', [FrontPagesControlller::class, 'whoweare']);


Route::prefix('/projects')->group(function () {
    Route::get('/', [FrontPagesControlller::class, 'projects']);
});

// Hirring
Route::prefix('/hiring')->group(function () {
    Route::get('/', [FrontPagesControlller::class, 'hiring']);
});


// Produk Route
Route::prefix('/products')->group(function () {
    // Produk Show
    Route::get('/', [FrontPagesControlller::class, 'produkPages'])->name('produk');
    Route::get('/{slugs}', [FrontPagesControlller::class, 'produkDetailsPages']);

    // Produk By Kategori
    Route::get('/kategori/{slugs}', [FrontPagesControlller::class, 'produkByKategori']);
    Route::get('/brand/{slugs}', [FrontPagesControlller::class, 'produkByBrand']);
});

// Servis Route
Route::prefix('/servis')->group(function () {
    Route::get('/', [FrontPagesControlller::class, 'servisPages'])->name('servis');
    Route::get('/{slugs}', [FrontPagesControlller::class, 'servisDetailPages']);
});

// News and Blog
Route::prefix('/news')->group(function () {
    Route::get('/', [FrontPagesControlller::class, 'newsPages'])->name('news');
    Route::get('/{slugs}', [FrontPagesControlller::class, 'newssDetailPages']);
});


// Slugs
Route::get('/{slugs}', [FrontPagesControlller::class, 'brand']);


// Search Product
Route::post('/products/search-product', [FrontPagesControlller::class, 'searchProduct']);
