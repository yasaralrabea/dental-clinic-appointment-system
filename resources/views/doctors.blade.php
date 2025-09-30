<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أطباء العيادة</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/doctor.css') }}">
</head>
<body>
    <div class="container">
        <h1>أطباء العيادة</h1>
        <div class="doctors-list">
            @foreach($doctors as $doctor)
                <div class="doctor-card">
                    <h3>{{ $doctor->name }}</h3>
                    <p>التخصص: {{ $doctor->specialty }}</p>
                    <p>الهاتف: <a href="tel:{{ $doctor->phone }}">{{ $doctor->phone }}</a></p>
                    <a href="mailto:{{ $doctor->email }}" class="contact-btn">تواصل مع الطبيب</a>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
