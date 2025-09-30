<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'عيادة الأسنان')</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- القائمة الجانبية -->
    <div class="sidebar" id="sidebar">
        <button class="toggle-btn" id="toggle-btn">&#9776;</button>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">الرئيسية</a></li>
                <li><a href="{{ route('appointments.new') }}">حجز موعد جديد</a></li>
                <li><a href="{{ route('appointments.index') }}">مواعيدي</a></li>
                <li><a href="{{ route('doctors.index') }}">أطباءنا</a></li>
                <li><a href="{{ route('logout') }}">تسجيل الخروج</a></li>
            </ul>
        </nav>
    </div>

    <!-- محتوى الصفحة -->
    <div class="container" id="main-container">
        <div class="header">
            <h1>@yield('page-title', 'عيادة الأسنان')</h1>
        </div>

        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- جافاسكربت للقائمة الجانبية -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggle-btn');

        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');
        });
    </script>
</body>
</html>
