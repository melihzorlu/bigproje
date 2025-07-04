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

use Illuminate\Support\Facades\View;

Route::get('/login', function () {
    return redirect('/'); // ya da özel login sayfan varsa ona yönlendir
})->name('login');

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
Route::view('/kariyer-gelistirme-merkezi', 'pages.career-center');
Route::get('/sikayet/{slug}', [ComplaintController::class, 'show'])->name('complaints.show');

Route::get('/deneyim-yaz', function () {
    if (!auth()->check()) {
        return redirect('/')->with('loginRequired', true);
    }
    return view('pages.createNewExperience');
})->name('deneyim.yaz');

Route::middleware('auth')->get('/deneyim-yaz', function () {
    return view('pages.createNewExperience');
})->name('deneyim.yaz');

Route::middleware('auth')->group(function () {
    Route::post('/complaint/create/step1', [ComplaintController::class, 'storeStep1'])->name('complaints.store.step1');
    Route::get('/deneyim-yaz/yazarak', [ComplaintController::class, 'createStep1'])->name('deneyim.yaz.yazarak');
    Route::post('/deneyim-yaz/yazarak', [ComplaintController::class, 'storeStep1'])->name('complaint.step1.store');

    // Sonraki adım yönlendirmesi için hazırlık (id ile yönlendirme)
    Route::get('/complaint/create/step2/{id}', [ComplaintController::class, 'step2'])->name('complaints.step2');});
Route::post('/complaint/create/step2/{id}', [ComplaintController::class, 'storeStep2'])->name('complaints.store.step2');
// Şikayet Oluşturma - 3. Adım (kategori ve diğer bilgiler)
Route::middleware('auth')->group(function () {
    Route::get('/deneyim-yaz/step3/{id}', [ComplaintController::class, 'step3'])->name('complaints.step3');
    Route::post('/deneyim-yaz/step3/{id}', [ComplaintController::class, 'storeStep3'])->name('complaints.step3.store');
});

// DENEYİM YAZ - Video ile
Route::middleware('auth')->get('/deneyim-yaz/video', function () {
    return view('pages.experience-write-video');
})->name('deneyim.yaz.video');
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
Route::post('/feedback/send', [App\Http\Controllers\FeedbackController::class, 'send'])->name('feedback.send');
// GİRİŞ / ÇIKIŞ
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/deneyim-yaz/yazarak/kaydet', [\App\Http\Controllers\ExperienceController::class, 'storeText'])
    ->name('deneyim.yaz.kaydet')
    ->middleware('auth');
// MIGRATE
Route::get('/run-migrate', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return 'Migration çalıştırıldı: ' . Artisan::output();
    } catch (\Exception $e) {
        return 'Hata: ' . $e->getMessage();
    }
});
