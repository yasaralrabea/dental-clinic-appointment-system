<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <!-- ===========================
         CSS مدمج
    ============================ -->
    <style>
        /* إعدادات عامة */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Cairo', sans-serif; }
        body { background-color: #f4f7fa; color: #333; line-height: 1.6; min-height: 100vh; display: flex; flex-direction: column; }

        /* الحاويات الأساسية */
        .container { max-width: 800px; margin: 50px auto; padding: 20px; }

        /* البطاقات (Forms, Sections) */
        .card { background-color: #ffffff; padding: 30px 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); margin-bottom: 30px; position: relative; }

        /* العناوين */
        h2 { color: #0072ff; font-size: 22px; font-weight: 700; margin-bottom: 20px; }

        /* الحقول (Inputs) */
        input[type="text"], input[type="email"], input[type="number"], input[type="password"] {
            width: 100%; padding: 12px 15px; border-radius: 10px; border: 1px solid #ccc; font-size: 16px; margin-top: 5px; margin-bottom: 20px; transition: all 0.3s ease;
        }
        input:focus { border-color: #0072ff; box-shadow: 0 0 8px rgba(0, 114, 255, 0.2); outline: none; }

        /* الأزرار */
        button, button[type="submit"] {
            background: linear-gradient(135deg, #00c6ff, #0072ff); color: #fff; padding: 12px 25px; font-size: 16px; font-weight: 600; border: none; border-radius: 12px; cursor: pointer; transition: all 0.3s ease;
        }
        button:hover, button[type="submit"]:hover { background: linear-gradient(135deg, #0099cc, #0059b3); transform: translateY(-2px) scale(1.02); }

        /* رسائل الأخطاء */
        .error-message { color: #ff4e50; font-size: 14px; margin-top: -15px; margin-bottom: 15px; }

        /* Responsive */
        @media (max-width: 768px) { .container { padding: 15px; margin: 20px auto; } }
    </style>

    <div class="container">

        <!-- تحديث معلومات الحساب الأساسية + العمر ورقم الهوية -->
        <div class="card">
            <h2>تحديث المعلومات</h2>
            <form method="POST" action="{{ route('user.update') }}">
                @csrf
                @method('patch')

                <label for="name">الاسم</label>
                <input id="name" type="text" name="name" value="{{ old('name', $info->name) }}" required autofocus>

                <label for="email">البريد الإلكتروني</label>
                <input id="email" type="email" name="email" value="{{ old('email', $info->email) }}" required>

                <label for="age">العمر</label>
                <input id="age" type="number" name="age" value="{{ old('age', $info->age) }}" required>

                 <label for="age">الجنس</label>
                <input id="gender" type="text" name="gender" value="{{ old('gender', $info->gender) }}" required>


                <label for="n_id">الرقم الوطني</label>
                <input id="n_id" type="text" name="n_id" value="{{ old('n_id', $info->n_id) }}" required>

                <button type="submit">تحديث الحساب</button>
            </form>
        </div>

        <!-- تحديث كلمة المرور -->
        <div class="card">
            <h2>تحديث كلمة المرور</h2>
            @include('profile.partials.update-password-form')
        </div>

        <!-- حذف الحساب -->
        <div class="card">
            <h2>حذف الحساب</h2>
            @include('profile.partials.delete-user-form')
        </div>

    </div>
</x-app-layout>
