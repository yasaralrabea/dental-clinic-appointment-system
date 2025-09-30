<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المواعيد</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/shows.css') }}">
    <!-- إضافة رابط Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <h1>إدارة مواعيد الطبيب</h1>

        <!-- عرض رسالة النجاح -->
        @if(session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i> تم الإلغاء 
            </div>
        @endif

        <!-- جدول المواعيد -->
        <table class="appointments-table">
            <thead>
                <tr>
                    <th>التاريخ</th>
                    <th>الاسم</th>
                    <th>الحالة</th>
                    <th>الوقت</th>
                    <th>حالة الموعد</th>
                    <th>اجراء</th>

                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->name }}</td>
                        <td>{{ $appointment->medical_condition }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>{{ $appointment->appointment_condition }}</td>

                        <!-- إضافة زر إلغاء و تم الموعد -->
                        <td>
                            <!-- نموذج حذف الموعد -->
                            <form action="{{ route('apps.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">إلغاء</button>
                            </form>

                             <form action="{{ route('apps.done', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">تم</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
