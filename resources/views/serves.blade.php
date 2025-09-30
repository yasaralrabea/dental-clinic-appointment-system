<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خدمات العيادة</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/serves.css') }}">
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
                        <p class="service-price"> {{ $serve->dics }} </p>
                        <p class="service-description">{{ $serve->price }}</p>

                    </div>
                @endforeach
            </div>
        @else
            <p class="no-services">لا توجد خدمات متاحة حاليًا.</p>
        @endif
    </div>
</body>
</html>
