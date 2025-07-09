@extends('layouts.app')
@section('title', 'Video ile Anlat')

@section('content')
    <style>
        .recorder-modal {
            max-width: 600px;
            margin: 0 auto;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            display: none;
        }

        .recorder-modal video {
            width: 100%;
            border-radius: 10px;
        }

        .recorder-modal .controls {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }

        @media (max-width: 576px) {
            .recorder-modal {
                padding: 15px;
            }

            .recorder-modal .controls {
                flex-direction: column;
            }
        }
    </style>

    <div class="container py-5">
        <h2 class="text-center mb-4">Deneyiminizi Video ile Anlatın</h2>

        <div class="row justify-content-center">
            <div class="col-md-8 text-center">

                <form method="POST" action="{{ route('complaints.video.store') }}" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    <input type="hidden" name="recorded_video" id="videoData">

                    <div class="form-group mb-4">
                        <label for="upload-gallery" class="btn btn-outline-secondary w-100">
                            Galeriden veya Kameradan Video Seç
                        </label>
                        <input id="upload-gallery" type="file" name="uploaded_video" accept="video/*" style="display:none;">
                    </div>

                    <p class="mt-4">veya</p>

                    <!-- Tarayıcı video kaydetme modali aç -->
                    <button type="button" class="btn btn-outline-primary w-100 mt-3" onclick="openRecorder()">Tarayıcı ile Video Kaydet</button>

                    <button type="submit" class="btn btn-success w-100 mt-4">Devam Et</button>
                </form>

                <!-- Tarayıcıdan video kaydetme alanı -->
                <div id="recorderModal" class="recorder-modal mt-5">
                    <video id="preview" autoplay muted playsinline></video>
                    <div class="controls">
                        <button id="startBtn" class="btn btn-primary">Kaydı Başlat</button>
                        <button id="stopBtn" class="btn btn-danger" style="display: none;">Kaydı Durdur</button>
                        <button type="button" class="btn btn-secondary" onclick="closeRecorder()">Kapat</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        let mediaRecorder;
        let recordedChunks = [];

        function openRecorder() {
            document.getElementById('recorderModal').style.display = 'block';
            window.scrollTo({ top: document.getElementById('recorderModal').offsetTop - 50, behavior: 'smooth' });
        }

        function closeRecorder() {
            document.getElementById('recorderModal').style.display = 'none';
        }

        document.getElementById('startBtn').onclick = async () => {
            const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
            document.getElementById('preview').srcObject = stream;

            mediaRecorder = new MediaRecorder(stream);
            recordedChunks = [];

            mediaRecorder.ondataavailable = e => {
                if (e.data.size > 0) recordedChunks.push(e.data);
            };

            mediaRecorder.onstop = () => {
                const blob = new Blob(recordedChunks, { type: 'video/webm' });
                const reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    document.getElementById('videoData').value = reader.result;
                    document.getElementById('uploadForm').submit();
                };
            };

            mediaRecorder.start();
            document.getElementById('startBtn').style.display = 'none';
            document.getElementById('stopBtn').style.display = 'inline-block';

            setTimeout(() => {
                if (mediaRecorder.state === "recording") mediaRecorder.stop();
            }, 150000);
        };

        document.getElementById('stopBtn').onclick = () => {
            mediaRecorder.stop();
            document.getElementById('stopBtn').style.display = 'none';
        };
    </script>
@endsection
