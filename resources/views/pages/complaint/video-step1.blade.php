<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Video ile Anlat</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            background: #f5f6fa;
            font-family: 'Segoe UI', sans-serif;
        }

        .experience-container {
            display: flex;
            min-height: 100vh;
        }

        .left-panel {
            width: 280px;
            background: #272635;
            color: white;
            padding: 40px 20px;
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
        }

        .left-panel img {
            height: 40px;
            margin-bottom: 40px;
        }

        .left-panel ul {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }

        .left-panel li {
            margin-bottom: 15px;
            font-size: 15px;
        }

        .left-panel li.active {
            color: #3ddc84;
            font-weight: bold;
        }

        .right-panel {
            flex: 1;
            padding: 60px;
            background: linear-gradient(to bottom right, #f7f8fd, #f5f6fa);
            border-top-right-radius: 40px;
            border-bottom-right-radius: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-box {
            background-color: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .recorder-modal {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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

        @media (max-width: 768px) {
            .experience-container {
                flex-direction: column;
            }

            .left-panel {
                width: 100%;
                border-radius: 0;
                text-align: center;
            }

            .right-panel {
                padding: 30px 20px;
                border-radius: 0;
            }

            .recorder-modal .controls {
                flex-direction: column;
            }

            #videoPreviewBox {
                margin-top: 20px;
                display: none;
            }

            #videoPreviewBox video {
                width: 100%;
                border-radius: 10px;
                margin-bottom: 15px;
            }

            #continueBtn {
                display: none;
            }
        }
    </style>
</head>
<body>

<div class="experience-container">
    <!-- Sol Panel -->
    <div class="left-panel">
        <a href="/" class="logo">
            <img width="175px" src="{{ asset('images/fimracvlogo.svg') }}" alt="FirmaCv" class="logo-img">
        </a>
        <h5>Deneyim Yaz</h5>
        <ul>
            <li class="active"><strong>1.</strong> Video ile Anlat</li>
            <li><strong>2.</strong> Firma</li>
            <li><strong>3.</strong> Belge</li>
        </ul>
    </div>

    <!-- Sağ Panel -->
    <div class="right-panel">
        <div class="form-box">
            <h4 class="text-center mb-4">Deneyiminizi Video ile Anlatın</h4>

            <form method="POST" action="{{ route('complaints.video.store') }}" enctype="multipart/form-data" id="uploadForm">
                @csrf
                <input type="hidden" name="recorded_video" id="videoData">

                <div class="form-group mb-4">
                    <label for="upload-gallery" class="btn btn-outline-secondary w-100">
                        Galeriden veya Kameradan Video Seç
                    </label>
                    <input id="upload-gallery" type="file" name="uploaded_video" accept="video/*" style="display:none;">
                </div>

                <p class="text-center my-3">veya</p>

                <button type="button" class="btn btn-outline-primary w-100" onclick="openRecorder()">Tarayıcı ile Video Kaydet</button>
                <div id="videoPreviewBox">
                    <video id="videoPreview" controls></video>
                </div>
                <button type="submit" class="btn btn-success w-100 mt-4">Devam Et</button>
            </form>

            <!-- Video Kaydetme Alanı -->
            <div id="recorderModal" class="recorder-modal mt-4" style="display:none;">
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

    const recorderModal = document.getElementById('recorderModal');
    const videoPreview = document.getElementById('videoPreview');
    const videoPreviewBox = document.getElementById('videoPreviewBox');
    const continueBtn = document.getElementById('continueBtn');

    // Galeriden video seçildiğinde önizle
    document.getElementById('upload-gallery').addEventListener('change', function (e) {
        const file = e.target.files[0];
        if (file) {
            const url = URL.createObjectURL(file);
            videoPreview.src = url;
            videoPreviewBox.style.display = 'block';
            continueBtn.style.display = 'block';
        }
    });

    function openRecorder() {
        recorderModal.style.display = 'block';
        window.scrollTo({ top: recorderModal.offsetTop - 100, behavior: 'smooth' });
    }

    function closeRecorder() {
        recorderModal.style.display = 'none';
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
            const url = URL.createObjectURL(blob);
            videoPreview.src = url;
            videoPreviewBox.style.display = 'block';
            continueBtn.style.display = 'block';

            const reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function () {
                document.getElementById('videoData').value = reader.result;
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

</body>
</html>
