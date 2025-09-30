<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>أطباء العيادة</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* تنسيق الصفحة العامة */
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 900px;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 40px;
        }

        /* قائمة الأطباء */
        .doctors-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }

        .doctor-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transition: transform 0.3s ease-in-out;
        }

        .doctor-card:hover {
            transform: translateY(-5px);
        }

        .doctor-card h3 {
            margin-top: 0;
            color: #007bff;
        }

        .doctor-card p {
            margin: 5px 0;
            color: #555;
        }

        .doctor-card a.contact-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        .doctor-card a.contact-btn:hover {
            background-color: #218838;
        }

        /* فورم إضافة طبيب جديد */
        .add-doctor-form {
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            width: 100%;
            transition: transform 0.3s ease-in-out;
        }

        .add-doctor-form:hover {
            transform: scale(1.02);
        }

        .add-doctor-form h2 {
            margin-bottom: 30px;
            font-size: 22px;
            color: #007bff;
            text-align: center;
        }

        .add-doctor-form label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }

        .add-doctor-form input, 
        .add-doctor-form select, 
        .add-doctor-form textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .add-doctor-form input:focus,
        .add-doctor-form select:focus,
        .add-doctor-form textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .add-doctor-form button {
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-doctor-form button:hover {
            background-color: #0056b3;
        }

        /* رسالة النجاح */
        .success-message {
            text-align: center;
            color: green;
            margin-bottom: 15px;
        }
    </style>
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

        <!-- فورم إضافة طبيب جديد -->
        <div class="add-doctor-form">
            <h2>إضافة طبيب جديد</h2>

            @if(session('success'))
                <p class="success-message">{{ session('success') }}</p>
            @endif

            <form action="{{ route('doctor.store') }}" method="POST">
                @csrf
                <label for="name">الاسم</label>
                <input type="text" id="name" name="name" required>

                <label for="cv">السيرة الذاتية</label>
                <textarea id="cv" name="cv" rows="3" required></textarea>

                <label for="phone">الهاتف</label>
                <input type="text" id="phone" name="phone" required>

                <label for="expertise">الخبرة</label>
                <input type="text" id="expertise" name="expertise" required>

                <label for="specialty">التخصص</label>
                <input type="text" id="specialty" name="specialty" required>

                <label for="Employment_date">تاريخ التوظيف</label>
                <input type="date" id="Employment_date" name="Employment_date" required>

                <label for="Contract_duration">مدة العقد</label>
                <input type="text" id="Contract_duration" name="Contract_duration" required>

                <label for="email">البريد الإلكتروني</label>
                <input type="email" id="email" name="email" required>

                <button type="submit">إضافة الطبيب</button>
            </form>
        </div>
    </div>
</body>
</html>
