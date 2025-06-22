<!-- resources/views/modals/experience-modal.blade.php -->
<div class="modal fade" id="experienceModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body p-5">
                <div id="experienceSteps">
                    <!-- Step 1 -->
                    <div class="step step-1">
                        <h5>Deneyim yaşadığınız firmanın adını yazın</h5>
                        <input type="text" name="firma" class="form-control my-3" placeholder="Firma adı">
                        <button class="btn btn-purple next-btn">İleri</button>
                    </div>

                    <!-- Step 2 -->
                    <div class="step step-2 d-none">
                        <h5>Şikayet Detayı</h5>
                        <textarea class="form-control my-3" rows="5" name="detay" placeholder="Şikayetinizi yazınız..."></textarea>
                        <button class="btn btn-secondary back-btn">Geri</button>
                        <button class="btn btn-purple next-btn">İleri</button>
                    </div>

                    <!-- Step 3 -->
                    <div class="step step-3 d-none">
                        <h5>Belge veya Fotoğraf</h5>
                        <input type="file" class="form-control my-3" multiple>
                        <button class="btn btn-secondary back-btn">Geri</button>
                        <button class="btn btn-success">Tamamla</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
