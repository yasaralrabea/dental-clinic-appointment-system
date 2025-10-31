<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yasar Clinic - حجز مواعيد</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <!-- أيقونات -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
   <!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <h2><i class="fa-solid fa-tooth"></i> </h2>
    <a href="/serves" class="button"><i class="fa-solid fa-stethoscope"></i> خدماتنا</a>
    <a href="/rates" class="button"><i class="fa-solid fa-star"></i> تقييمات</a>
    <a href="/articals" class="button"><i class="fa-solid fa-newspaper"></i> مقالات</a>
    <a href="/send" class="button"><i class="fa-solid fa-comments"></i> اسأل طبيب</a>
    <a href="/my_q" class="button"><i class="fa-solid fa-comments"></i> اسألتي</a>

</div>

<!-- Main Container -->
<div class="container">
    <!-- Header -->
    <div class="header">
        <!-- زر طي القائمة -->
        <button class="toggle-btn" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>

        <h1> dental clinic</h1>

        <!-- أزرار تسجيل الدخول/الخروج وحسابي -->
        <div class="header-buttons">
            @if(Auth::check())
                <!-- أيقونة الحساب -->
                <a href="{{ route('user.edit') }}" class="account-btn" title="حسابي">
                    <i class="fa-solid fa-user"></i>
                </a>

                <!-- زر تسجيل الخروج -->
                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-btn">تسجيل الخروج</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="login-btn">تسجيل الدخول</a>
            @endif
        </div>
    </div>

    <!-- محتوى الصفحة -->
    <div class="main-content">
        <h1>عيادتك المفضلة </h1>

        <!-- الأزرار الرئيسية -->
        <div class="button-container">
            <a href="/new_appointment" class="main-btn"><i class="fa-solid fa-calendar-check"></i> حجز موعد جديد</a>
            <a href="/my_appointments" class="main-btn"><i class="fa-solid fa-clock"></i> مواعيدي</a>
            <a href="/doctors" class="main-btn"><i class="fa-solid fa-user-doctor"></i> أطباؤنا</a>
        </div>

        <!-- سيرة العيادة -->
        <div class="clinic-bio">
            <h2>عن عيادتنا</h2>
            <p>عيادتنا من العيادات الرائدة في تقديم الرعاية الصحية بأعلى معايير الجودة. نقدم خدمات متكاملة باستخدام أحدث التقنيات.</p>
            <p><strong>أوقات العمل</strong></p>
            <p><strong>يومياً عدا الجمعة</strong></p>
            <p><strong>9:30 - 4:30</strong></p>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-item">
            <h3>تواصل معنا</h3>
            <p>هاتف: +123 456 789</p>
            <p>البريد الإلكتروني: info@yasarclinic.com</p>
        </div>
        <div class="footer-item">
            <h3>نبذة عنا</h3>
            <p>Yasar Clinic تقدم خدمات متميزة بأحدث التقنيات الطبية.</p>
        </div>
        <div class="footer-item">
            <h3>رؤيتنا</h3>
            <p>راحة المريض أولاً</p>
            <p>الخيار الأول دائماً</p>
        </div>
    </div>
</div>

<!-- Script لطي القائمة -->
<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("collapsed");
    }
</script>
</body>
</html>
