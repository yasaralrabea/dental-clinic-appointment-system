<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حجز موعد جديد</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/new_appointment.css') }}">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>حجز موعد جديد</h1>
    </div>

    <div class="main-content">
        <form action="{{ route('new.store') }}" method="POST">
            @csrf
            <!-- بيانات المستخدم -->
            <div class="form-group">
                <label for="name">الاسم الكامل:</label>
                <input type="text" id="name" name="name" required value="{{ old('name', $user->name) }}">
            </div>

            <div class="form-group">
                <label for="gender">الجنس:</label>
                <select id="gender" name="gender" required>
                    <option value="ذكر" {{ old('gender', $user->gender) == 'ذكر' ? 'selected' : '' }}>ذكر</option>
                    <option value="أنثى" {{ old('gender', $user->gender) == 'أنثى' ? 'selected' : '' }}>أنثى</option>
                </select>
            </div>

            <div class="form-group">
                <label for="age">العمر:</label>
                <input type="number" id="age" name="age" required value="{{ old('age', $user->age) }}">
            </div>

            <div class="form-group">
                <label for="n_id">الرقم الوطني :</label>
                <input type="number" id="n_id" name="n_id" required value="{{ old('n_id', $user->n_id) }}">
            </div>

            <!-- الحالة المرضية -->
            <div class="form-group">
                <label for="medical_condition">الحالة المرضية :</label>
                <input type="text" id="medical_condition" name="medical_condition" value="{{ old('medical_condition') }}" required>
            </div>

            <!-- قائمة المواعيد -->
            <div class="form-group">
                <label for="appointment_date">الموعد:</label>
                <select id="appointment_date" name="appointment_date" required>
                    @foreach($all_dates as $date)
                        <option value="{{ $date->date }}">{{ $date->date }}</option>
                    @endforeach
                </select>
            </div>

            <!-- قائمة الأوقات -->
            <div class="form-group">
                <label for="appointment_time">الوقت:</label>
                <select id="appointment_time" name="appointment_time" required>
                    <option value="">اختر موعدًا</option>
                </select>
            </div>

            <!-- سعر الكشف -->
            <div class="form-group">
                <label for="price">سعر الكشف :</label>
                <input type="text" id="price" name="price" value="10 JD" readonly>
            </div>

            <div class="form-group">
                <button type="submit">حجز الموعد</button>
            </div>
        </form>
    </div>
</div>

<!-- jQuery + AJAX لتحميل الأوقات -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function loadTimes(date) {
        $.ajax({
            url: '{{ route('getTimesForDate') }}',
            method: 'GET',
            data: { date: date },
            success: function(response) {
                $('#appointment_time').empty();
                if(response.times.length > 0){
                    response.times.forEach(function(time) {
                        $('#appointment_time').append('<option value="'+ time +'">'+ time +'</option>');
                    });
                } else {
                    $('#appointment_time').append('<option value="">لا توجد أوقات متاحة</option>');
                }
            }
        });
    }

    // تحميل الأوقات عند تغيير التاريخ
    $('#appointment_date').change(function() {
        var selectedDate = $(this).val();
        loadTimes(selectedDate);
    });

    // تحميل الأوقات عند تحميل الصفحة لأول مرة
    var initialDate = $('#appointment_date').val();
    if(initialDate) {
        loadTimes(initialDate);
    }
});
</script>
</body>
</html>
