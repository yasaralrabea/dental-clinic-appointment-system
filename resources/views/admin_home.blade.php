<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم </title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin_home.css') }}">
</head>
<body>
    <header class="header">
        <h1>لوحة التحكم بالموقع </h1>
        <div class="header-actions">
            <!-- زر حسابي -->
            <a href="{{ route('profile.edit') }}" class="header-button">حسابي</a>
            
            <!-- زر تسجيل الخروج -->
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="header-button">تسجيل الخروج</button>
            </form>
        </div>
    </header>

    <main class="main-content">
        <div class="button-container">
            <a href="/appointments_controll" class="button">التحكم بالمواعيد</a>
            <a href="/patient_appointments" class="button">حجوزات المرضى القادمة</a>
            <a href="/serves_controll" class="button">التحكم بالخدمات</a>
            <a href="/show_Q" class="button">الأسئلة الواردة</a>
            <a href="/add_artical_view" class="button">نشر مقالات</a>
            <a href="/doctors_index" class="button">التحكم بالأطباء</a>
            <a href="/users_admin" class="button">المستخدمين والإدارة</a>
            <a href="/all_appointments" class="button">كل المواعيد</a>

        </div>
    </main>

    <footer class="footer">
        <div class="footer-item">
            <h3>تواصل معنا</h3>
            <p>هاتف: +123 456 789</p>
            <p>البريد الإلكتروني: info@yasarclinic.com</p>
        </div>
        <div class="footer-item">
            <h3>نبذة عنا</h3>
            <p>نظام الإدارة لعرض وإدارة محتوى العيادة بكل سهولة.</p>
        </div>
    </footer>
</body>
</html>
