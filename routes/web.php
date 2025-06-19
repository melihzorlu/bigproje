<?php


/*Route::get('/', function () {
    return view('welcome');
});*/
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Artisan;



// Giriş
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Çıkış
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', function () {
    return redirect(\Filament\Facades\Filament::getUrl());
});
// ANA SAYFA
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/register', [AuthController::class, 'register'])->name('register');
// SABİT SAYFALAR
Route::view('/hakkimizda', 'pages.about');
Route::view('/kurumsal-uyelik', 'pages.corporate-membership');
Route::view('/degerlendirme-klavuzu', 'pages.evaluationGuide');
Route::view('/bireysel-uyelik-sozlesmesi', 'pages.individualMembershipAgreement');
Route::view('/kullanim-kosullari', 'pages.termsofUse');
Route::view('/iletisim', 'pages.contact');
Route::view('/ziyaretci-aydinlatma', 'pages.visitorInformation');
Route::view('/cerez-aydinlatma', 'pages.cookieAgreement');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.detail');
Route::view('/uye-aydinlatma', 'pages.memberInformation');
Route::view('/profile', 'pages.profile');
Route::view('/complaint-create', 'pages.complaint-create');
Route::view('/complaint-detail', 'pages.complaint-detail');
Route::get('/sikayet/{slug}', [ComplaintController::class, 'show'])->name('complaints.show');

Route::view('/blog-detail', 'pages.blog-detail');

// BLOG
Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
});

use App\Http\Controllers\SocialAuthController;

Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');

// ŞİKAYET
Route::prefix('sikayet')->group(function () {
    Route::get('/{slug}', [ComplaintController::class, 'show'])->name('complaint.show');
});
// SSS
Route::get('/sss', [FaqController::class, 'index'])->name('faq.index');

// GİRİŞ / ÇIKIŞ
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// MIGRATE
Route::get('/run-migrate', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return 'Migration çalıştırıldı: ' . Artisan::output();
    } catch (\Exception $e) {
        return 'Hata: ' . $e->getMessage();
    }
});
