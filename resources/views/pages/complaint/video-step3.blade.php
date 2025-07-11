@extends('layouts.app')
@section('title', 'Firma Seç')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4 text-center">Hangi firmayla sorun yaşadınız?</h2>

        <form method="POST" action="{{ route('complaints.video.complete', $complaint->id) }}">
            @csrf

            {{-- Firma Seçimi --}}
            <div class="form-group mb-3">
                <label for="company_id">Firma Seçiniz</label>
                <select name="company_id" id="company_id" class="form-select" required>
                    <option value="">Firma seçiniz</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" {{ $complaint->company_id == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                    <option value="new">+ Yeni Firma Ekle</option>
                </select>
            </div>

            {{-- Şube Seçimi (Mevcut firma için) --}}
            <div id="branch-area" class="form-group mb-3" style="display: none;">
                <label for="branch_id">Şube Seçiniz</label>
                <select name="branch_id" id="branch_id" class="form-select">
                    <option value="">Şube seçiniz</option>
                    {{-- Seçilen firmaya göre şubeler dinamik yüklenecek --}}
                </select>
            </div>

            {{-- Yeni Firma Ekleme Alanı --}}
            <div id="new-company-fields" style="display: none;">
                <div class="mb-2">
                    <label>Firma Adı</label>
                    <input type="text" name="new_name" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Adres</label>
                    <input type="text" name="new_address" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Vergi Numarası</label>
                    <input type="text" name="new_tax_number" class="form-control">
                </div>
                <div class="mb-2">
                    <label>MERSİS Numarası (Opsiyonel)</label>
                    <input type="text" name="new_mersis_no" class="form-control">
                </div>

                {{-- Yeni Şube Bilgileri --}}
                <div class="mb-2">
                    <label>Şube Adı</label>
                    <input type="text" name="new_branch_name" class="form-control">
                </div>
                <div class="mb-2">
                    <label>Şube Adresi</label>
                    <input type="text" name="new_branch_address" class="form-control">
                </div>
            </div>

            <div class="text-end mt-4">
                <button type="submit" class="btn btn-success">Tamamla</button>
            </div>
        </form>
    </div>

    {{-- JS --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const companySelect = document.getElementById('company_id');
            const newFields = document.getElementById('new-company-fields');
            const branchArea = document.getElementById('branch-area');
            const branchSelect = document.getElementById('branch_id');

            companySelect.addEventListener('change', function () {
                const selectedValue = this.value;

                if (selectedValue === 'new') {
                    newFields.style.display = 'block';
                    branchArea.style.display = 'none';
                    branchSelect.innerHTML = '';
                } else if (selectedValue !== '') {
                    newFields.style.display = 'none';
                    branchArea.style.display = 'block';

                    fetch(`/branches/by-company/${selectedValue}`)
                        .then(response => response.json())
                        .then(data => {
                            branchSelect.innerHTML = '<option value="">Şube seçiniz</option>';
                            data.forEach(branch => {
                                branchSelect.innerHTML += `<option value="${branch.id}">${branch.name}</option>`;
                            });
                        });
                } else {
                    newFields.style.display = 'none';
                    branchArea.style.display = 'none';
                    branchSelect.innerHTML = '';
                }
            });

            // Sayfa yüklendiğinde seçili firma varsa şubeleri getir
            if (companySelect.value && companySelect.value !== 'new') {
                companySelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
@endsection
