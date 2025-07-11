<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kategori ve Detay - Deneyim Yaz</title>
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
        .left-panel h5 {
            font-size: 20px;
            font-weight: bold;
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
            padding: 80px 60px;
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

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control, .form-select {
            border-radius: 15px;
            padding: 12px 16px;
        }

        .btn-next {
            background: #3ddc84;
            color: white;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 30px;
            border: none;
            margin-top: 20px;
        }

        .btn-back {
            background: #ddd;
            color: black;
            font-weight: bold;
            padding: 12px 30px;
            border-radius: 30px;
            border: none;
            margin-top: 20px;
            margin-right: 10px;
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
                border-radius: 0;
                padding: 40px 20px;
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
        <h5> Deneyim Yaz</h5>
        <ul>
            <li><strong>1.</strong> Şikayet Detayı</li>
            <li><strong>2.</strong> Firma</li>
            <li class="active"><strong>3.</strong> Belge / Kategori</li>
        </ul>
    </div>

    <!-- Sağ Panel -->
    <div class="right-panel">
        <div class="form-box">
            <h4 class="mb-4">Lütfen şikayetinizle ilgili kategoriyi ve detayları belirtin</h4>

            <form method="POST" action="{{ route('complaints.step3.store', $complaint->id) }}">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-bold">Kategori Seçimi <span class="text-muted">(En fazla 4 adet)</span></label>

                    <div class="category-scroll-box">
                        <div class="row row-cols-2 row-cols-md-3 g-3">
                            @foreach($categories as $category)
                                <div class="col">
                                    <label class="category-card">
                                        <input type="checkbox" name="category_ids[]" value="{{ $category->id }}" class="category-checkbox">
                                        <div class="category-content">
                                            {{ $category->name }}
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="text-danger mt-2" id="limit-warning" style="display: none;">En fazla 4 kategori seçebilirsiniz.</div>
                </div>

                <div class="mb-4">
                    <label for="details" class="form-label fw-bold">Ek Detaylar</label>
                    <textarea name="details" id="details" class="form-control" rows="5" placeholder="Eklemek istediğiniz detaylar..."></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('complaints.step2', $complaint->id) }}" class="btn-back">Geri</a>
                    <button type="submit" class="btn-next">Tamamla</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const checkboxes = document.querySelectorAll('.category-checkbox');
        const warning = document.getElementById('limit-warning');

        checkboxes.forEach(cb => {
            cb.addEventListener('change', () => {
                const checkedCount = [...checkboxes].filter(c => c.checked).length;
                if (checkedCount > 4) {
                    cb.checked = false;
                    warning.style.display = 'block';
                    setTimeout(() => warning.style.display = 'none', 2000);
                }
            });
        });
    });
</script>
<style>
    .category-scroll-box {
        max-height: 320px;
        overflow-y: auto;
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        background-color: #fff;
    }

    .category-card {
        display: block;
        position: relative;
        cursor: pointer;
    }

    .category-checkbox {
        display: none;
    }

    .category-content {
        padding: 20px;
        border: 2px solid transparent;
        border-radius: 12px;
        background: #f8f9fa;
        text-align: center;
        font-weight: 500;
        transition: all 0.2s ease;
    }

    .category-card input:checked + .category-content {
        border-color: #6b5ce3;
        background-color: #eafff2;
        color: #6b5ce3;
        font-weight: bold;
        box-shadow: 0 0 0 2px #6b5ce3 inset;
    }

    .category-content:hover {
        border-color: #d0d0d0;
    }

    /* Scrollbar uyumlu */
    .category-scroll-box::-webkit-scrollbar {
        width: 6px;
    }

    .category-scroll-box::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 6px;
    }

    .category-scroll-box::-webkit-scrollbar-track {
        background: transparent;
    }
</style>
</body>
</html>
