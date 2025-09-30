<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض التقييمات</title>
    <link rel="stylesheet" href="{{ asset('css/rate.css') }}">
</head>
<body>
    <div class="container">
        <h1>التقييمات</h1>
        
        <!-- فورم إضافة التقييم -->
        <form action="{{ route('rates.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="اسمك" class="form-input" required>
            </div>
            <div class="form-group">
                <textarea name="comment" placeholder="اكتب تقييمك" class="form-input" required></textarea>
            </div>
            <button type="submit" class="submit-btn">إضافة التقييم</button>
        </form>
        
        @if($rates->isEmpty())
            <p class="no-rates">لا توجد تقييمات حالياً.</p>
        @else
            <div class="rates-grid">
                @foreach($rates as $rate)
                    <div class="rate-card">
                        <h3 class="user-name">{{ $rate->name }}</h3>
                        <p class="comment">{{ $rate->comment }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
