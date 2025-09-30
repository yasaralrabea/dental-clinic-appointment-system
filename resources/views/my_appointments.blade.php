<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مواعيدي</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007BFF;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no-appointments {
            text-align: center;
            padding: 20px;
            font-size: 18px;
            color: #555;
        }
        button {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }
        .pay-btn {
            background-color: green;
        }
        .delete-btn {
            background-color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>مواعيدي</h1>

        @if($appointments->count() > 0)
            <table>
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>العمر</th>
                        <th>الجنس</th>
                        <th>الرقم الوطني</th>
                        <th>الحالة المرضية</th>
                        <th>التاريخ</th>
                        <th>الوقت</th>
                        <th>السعر</th>
                        <th>حالة الموعد</th>
                        <th>الدفع</th>
                        <th>حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->name }}</td>
                            <td>{{ $appointment->age }}</td>
                            <td>{{ $appointment->gender }}</td>
                            <td>{{ $appointment->n_id }}</td>
                            <td>{{ $appointment->medical_condition }}</td>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>{{ $appointment->price }} JD</td>
                            <td>{{ $appointment->appointment_condition }}</td>

                            <td>
                                <form action="{{ route('payment', $appointment->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="pay-btn">دفع</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('apps.destroy', $appointment->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا الموعد؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">حذف</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="no-appointments">
                لا توجد مواعيد حتى الآن.
            </div>
        @endif
    </div>
</body>
</html>
