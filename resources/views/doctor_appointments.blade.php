<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة المواعيد</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/patient_appointments.css') }}">
</head>
<body>
    <div class="container">
        <h1>إدارة مواعيد الطبيب</h1>

        <!-- عرض رسالة النجاح -->
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <!-- نموذج إضافة موعد جديد -->
        <form action="{{ route('appointments.store') }}" method="POST" class="add-appointment-form">
            @csrf
            <label for="appointment_date">تاريخ الموعد:</label>
            <input type="date" name="appointment_date" id="appointment_date" required>
            <label for="appointment_time">تاريخ الموعد:</label>
            <input type="time" name="appointment_time" id="appointment_time" required>

            <button type="submit" class="add-button">إضافة موعد</button>
        </form>

        <!-- جدول المواعيد -->
        <table class="appointments-table">
            <thead>
                <tr>
                    <th>التاريخ</th>
                    <th>الوقت</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>

                        <td>
                            <!-- نموذج حذف الموعد -->
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
