@extends('layouts.app')
@section('title', 'Profile')

@section('content')
    <div class="container-fluid custom-profile-page">
        <div class="row">
            {{-- Sidebar --}}
            <div class="col-md-3 custom-sidebar bg-dark text-white py-4">
                <div class="text-center mb-4">
                    <h4 class="fw-bold">FİRMA CV</h4>
                </div>
                <div class="bg-dark text-white p-3 custom-sidebar" style="min-height: 100vh; width: 250px;">

                    <div class="bg-dark text-white p-3 sidebar-custom" style="min-height: 100vh; width: 250px;">

                        <a href="" class="{{ request()->routeIs('profile.edit') ? 'active' : '' }}">Profilimi Düzenle</a>
                        <a href="" class="{{ request()->routeIs('notification.preferences') ? 'active' : '' }}">Bildirim Tercihleri</a>
                        <a href="" class="{{ request()->routeIs('account.delete') ? 'active' : '' }}">Hesabımı Sil</a>
                        <a href="" class="{{ request()->routeIs('complaints.index') ? 'active' : '' }}">Şikayetlerim</a>
                        <a href="" class="{{ request()->routeIs('notifications.index') ? 'active' : '' }}">Bildirilerim</a>
                        <a href="" class="{{ request()->routeIs('supports.index') ? 'active' : '' }}">Desteklediklerim</a>
                        <a href="" class="{{ request()->routeIs('comments.index') ? 'active' : '' }}">Yorumladıklarım</a>
                        <a href="" class="{{ request()->routeIs('saved.index') ? 'active' : '' }}">Kaydedilenler</a>
                        <a href="" class="{{ request()->routeIs('test.join') ? 'active' : '' }}">Teste Katıl</a>


                    </div>

                </div>
            </div>

            {{-- Main Content --}}
            <div class="col-md-9 p-5 bg-light custom-profile-content">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/80" class="rounded-circle me-3" alt="Profile Photo">
                        <div>
                            <h4 class="mb-0">Burak Taşkıran</h4>
                            <button class="btn btn-success btn-sm mt-2">Yeni Fotoğraf Yükle</button>
                            <button class="btn btn-secondary btn-sm mt-2">Kaldır</button>
                        </div>
                    </div>
                    <div>
                        <span class="text-muted">Şikayetler</span> -
                        <span class="text-muted">Desteklerin</span> -
                        <span class="text-muted">Yorumların</span>
                    </div>
                </div>

                <form class="custom-profile-form">
                    <div class="mb-3">
                        <label for="name" class="form-label">Ad Soyad</label>
                        <input type="text" class="form-control" id="name" value="Burak Taşkıran" disabled>
                        <small class="text-success">✓</small>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-posta</label>
                        <input type="email" class="form-control" id="email" value="burak_Art@hotmail.com" disabled>
                        <small class="text-success">✓</small>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefon</label>
                        <input type="text" class="form-control" id="phone" value="-" disabled>
                        <small class="text-danger">Doğrulanmadı</small>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Şifre</label>
                        <input type="password" class="form-control" id="password" value="********" disabled>
                    </div>
                </form>

                {{-- Profil Gücü --}}
                <div class="mt-5 p-4 bg-white rounded shadow-sm">
                    <h6 class="fw-bold">Profilinizin Gücü: <span class="text-success">%33.3</span></h6>
                    <div class="progress mb-3" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: 33.3%;"></div>
                    </div>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-check-circle-fill text-success me-1"></i> Profil Fotoğrafı Yüklendi</li>
                        <li><i class="bi bi-x-circle-fill text-danger me-1"></i> <a href="#">E-Postanı Doğrula</a></li>
                        <li><i class="bi bi-x-circle-fill text-danger me-1"></i> <a href="#">Telefonunu Doğrula</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
