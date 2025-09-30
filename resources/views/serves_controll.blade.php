<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خدمات العيادة</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/serves_controll.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="title">خدمات العيادة</h1>

        @if($serves->count() > 0)
            <div class="services">
                @foreach($serves as $serve)
                    <div class="service-card">
                        <h2 class="service-title">{{ $serve->name }}</h2>
                        <p class="service-description">{{ $serve->tittle }}</p>
                        <p class="service-price">{{ $serve->dics }} </p>
                        <form action="{{ route('serves.destroy', $serve->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">حذف</button>
                        </form>
                    </div>
                @endforeach
            </div>
        @else
            <p class="no-services">لا توجد خدمات متاحة حاليًا.</p>
        @endif

        <!-- فورم إضافة خدمة جديدة -->
        <div class="add-service-form">
            <h2>إضافة خدمة جديدة</h2>
            <form action="{{ route('serves.store') }}" method="POST">
                @csrf
               
                <div class="form-group">
                    <label for="tittle">عنوان الخدمة</label>
                    <input type="text" id="tittle" name="tittle" required>
                </div>
           
                  
                <div class="form-group">
                    <label for="dics">وصف الخدمة</label>
                    <input type="text" id="disc" name="dics" required>
                </div>
                       
                <div class="form-group">
                    <label for="price">سعر الخدمة</label>
                    <input type="text" id="price" name="price" required>
                </div>
               
                <button type="submit" class="submit-button">إضافة</button>
            </form>
        </div>
    </div>
</body>
</html>
