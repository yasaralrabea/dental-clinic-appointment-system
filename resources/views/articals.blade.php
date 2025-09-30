<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المقالات </title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/artical.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="title">مقالاتنا العلمية</h1>

        @if($articals->count() > 0)
            <div class="services">
                @foreach($articals as $artical)
                    <div class="service-card">
                        <p class="service-tittle">{{ $artical->tittle }}</p>
                        <p class="service-disc"> {{ $artical->dics }} </p>
                    </div>
                @endforeach
            </div>
        @else
            <p class="no-services">لا توجد مقالات متاحة حاليًا.</p>
        @endif
    </div>
</body>
</html>



