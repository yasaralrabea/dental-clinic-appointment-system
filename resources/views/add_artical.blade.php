<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المقالات</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add_artical.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="title">إضافة مقالة</h1>
        
        <!-- فورم إضافة المقالة -->
        <form action="{{ route('artical.store') }}" method="POST">
            @csrf
            <input type="text" name="tittle" placeholder="عنوان المقالة" class="form-input" required>
            <textarea name="dics" placeholder="نص المقالة" class="form-input" required></textarea>
            <button type="submit" class="submit-btn">إضافة المقالة</button>
        </form>

        <h2>المقالات المنشورة</h2>

        @if($articals->count() > 0)
            <div class="services">
                @foreach($articals as $artical)
                    <div class="service-card">
                        <p class="service-tittle">{{ $artical->tittle }}</p>
                        <p class="service-disc"> {{ $artical->dics }} </p>
                        
                        <!-- زر الحذف -->
                        <form action="{{ route('artical.destroy', $artical->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">حذف</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="no-services">لا توجد مقالات متاحة حاليًا.</p>
        @endif
    </div>
</body>
</html>
