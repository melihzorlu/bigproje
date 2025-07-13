<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\{
    HomeController,
    BlogController,
    ComplaintController,
    FaqController,
    AuthController,
    MailController,
    FeedbackController,
    SocialAuthController
};
use Filament\Facades\Filament;

Route::get('/admin', function () {
    return redirect(Filament::getUrl());
});
// GİRİŞ / ÇIKIŞ ROTALARI
Route::get('/login', fn() => redirect('/'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// FİLAMENT PANEL YÖNLENDİRMESİ
Route::get('/admin', fn() => redirect(\Filament\Facades\Filament::getUrl()));

// ANA SAYFA
Route::get('/', [HomeController::class, 'index'])->name('home');

// SABİT SAYFALAR
Route::view('/hakkimizda', 'pages.about');
Route::view('/kurumsal-uyelik', 'pages.corporate-membership');
Route::view('/degerlendirme-klavuzu', 'pages.evaluationGuide');
Route::view('/bireysel-uyelik-sozlesmesi', 'pages.individualMembershipAgreement');
Route::view('/kullanim-kosullari', 'pages.termsofUse');
Route::view('/iletisim', 'pages.contact');
Route::view('/ziyaretci-aydinlatma', 'pages.visitorInformation');
Route::view('/cerez-aydinlatma', 'pages.cookieAgreement');
Route::view('/uye-aydinlatma', 'pages.memberInformation');
Route::view('/profile', 'pages.profile');
Route::view('/complaint-create', 'pages.complaint-create');
Route::view('/complaint-detail', 'pages.complaint-detail');
Route::view('/kariyer-gelistirme-merkezi', 'pages.career-center');
Route::view('/blog-detail', 'pages.blog-detail');

// MAİL GÖNDERİMİ
Route::post('/send-company-mail', [MailController::class, 'sendCompanyMail'])->name('send.company.mail');
Route::post('/send-person-mail', [MailController::class, 'sendPersonMail'])->name('send.person.mail');

// ŞİKAYET GÖRÜNTÜLEME
Route::get('/sikayet/{slug}', [ComplaintController::class, 'show'])->name('complaints.show');
Route::prefix('sikayet')->group(function () {
    Route::get('/{slug}', [ComplaintController::class, 'show'])->name('complaint.show');
});

// DENEYİM YAZ ROTALARI
Route::get('/deneyim-yaz', function () {
    return auth()->check()
        ? view('pages.createNewExperience')
        : redirect('/')->with('loginRequired', true);
})->name('deneyim.yaz');

Route::middleware('auth')->group(function () {
    Route::get('/deneyim-yaz/yazarak', [ComplaintController::class, 'createStep1'])->name('deneyim.yaz.yazarak');
    Route::post('/deneyim-yaz/yazarak', [ComplaintController::class, 'storeStep1'])->name('complaint.step1.store');
    Route::post('/complaint/create/step1', [ComplaintController::class, 'storeStep1'])->name('complaints.store.step1');
    Route::get('/complaint/create/step2/{id}', [ComplaintController::class, 'step2'])->name('complaints.step2');
    Route::post('/complaint/create/step2/{id}', [ComplaintController::class, 'storeStep2'])->name('complaints.store.step2');
    Route::get('/deneyim-yaz/step3/{id}', [ComplaintController::class, 'step3'])->name('complaints.step3');
    Route::post('/deneyim-yaz/step3/{id}', [ComplaintController::class, 'storeStep3'])->name('complaints.step3.store');
    Route::get('/deneyim-yaz/video', fn() => view('pages.experience-write-video'))->name('deneyim.yaz.video');
    Route::post('/deneyim-yaz/yazarak/kaydet', [ExperienceController::class, 'storeText'])->name('deneyim.yaz.kaydet');
});

//VİDEO YUKLE
Route::get('/deneyim-yaz/video', [ComplaintController::class, 'videoStep1'])->name('complaints.video.step1');
Route::post('/deneyim-yaz/video', [ComplaintController::class, 'videoStore'])->name('complaints.video.store');
Route::get('/deneyim-yaz/video/{id}/aciklama', [ComplaintController::class, 'videoStep2'])->name('complaints.video.step2');
Route::post('/deneyim-yaz/video/{id}/aciklama', [ComplaintController::class, 'videoStoreStep2'])->name('complaints.video.step2.store');
Route::get('/deneyim-yaz/video/{id}/firma', [ComplaintController::class, 'videoStep3'])->name('complaints.video.step3');
Route::post('/deneyim-yaz/video/{id}/tamamla', [ComplaintController::class, 'videoComplete'])->name('complaints.video.complete');

// BLOG
Route::prefix('blog')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('blog.show');
});

// SSS
Route::get('/sss', [FaqController::class, 'index'])->name('faq.index');

// GERİ BİLDİRİM
Route::post('/feedback/send', [FeedbackController::class, 'send'])->name('feedback.send');

// SOSYAL GİRİŞ
Route::get('/auth/{provider}', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback'])->name('social.callback');
Route::get('/branches/by-company/{company}', function (\App\Models\Company $company) {
    return $company->branches()->select('id', 'name', 'address')->get();
});

// routes/web.php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

Route::get('sifremi-unuttum', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('sifremi-unuttum', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('sifre-sifirla/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('sifre-sifirla', [ResetPasswordController::class, 'reset'])->name('password.update');

use App\Http\Controllers\ProfileController;
Route::prefix('profilim')->middleware(['auth'])->group(function () {
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/deneyimlerim', [ProfileController::class, 'experiences'])->name('profile.experiences');
    Route::get('/yorumlarim', [ProfileController::class, 'comments'])->name('profile.comments');
});

use App\Http\Controllers\CommentController;

Route::middleware(['auth'])->group(function () {
    Route::post('/complaints/{id}/comment', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{id}/reply', [CommentController::class, 'reply'])->name('comments.reply');
    Route::post('/comments/{id}/like', [CommentController::class, 'like'])->name('comments.like');
    Route::post('/comments/{id}/report', [CommentController::class, 'report'])->name('comments.report');
    Route::post('/comments/{id}/moderate', [CommentController::class, 'moderate'])->name('comments.moderate'); // admin yetkisi gerekli
});
Route::get('/branches/by-company/{id}', [BranchController::class, 'getBranches']);
// MIGRATE ÇALIŞTIR
Route::get('/run-migrate', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return 'Migration çalıştırıldı: ' . Artisan::output();
    } catch (\Exception $e) {
        return 'Hata: ' . $e->getMessage();
    }
});
