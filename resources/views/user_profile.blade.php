<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('الملف الشخصي') }}
        </h2>
    </x-slot>

    <style>
        body { font-family: 'Cairo', sans-serif; background-color: #f4f7fa; }
        .container { max-width: 600px; margin: 40px auto; padding: 20px; }
        .card { background-color: #fff; padding: 30px 25px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { color: #0072ff; font-size: 22px; font-weight: 700; margin-bottom: 20px; text-align: center; }
        .info { margin-bottom: 15px; }
        .label { font-weight: 600; color: #555; }
        .value { color: #333; margin-top: 5px; }
        .btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background-color: #00c6ff; color: #fff; border-radius: 12px; text-decoration: none; font-weight: 600; transition: all 0.3s ease; }
        .btn:hover { background-color: #0072ff; transform: translateY(-2px) scale(1.02); }
    </style>

    <div class="container">
        <div class="card">
            <h2>معلومات المستخدم</h2>

            <div class="info">
                <div class="label">الاسم:</div>
                <div class="value">{{ $user->name }}</div>
            </div>

            <div class="info">
                <div class="label">البريد الإلكتروني:</div>
                <div class="value">{{ $user->email }}</div>
            </div>

            <div class="info">
                <div class="label">العمر:</div>
                <div class="value">{{ $user->age ?? 'غير محدد' }}</div>
            </div>

            <div class="info">
                <div class="label">الجنس:</div>
                <div class="value">{{ $user->gender ?? 'غير محدد' }}</div>
            </div>

            <div class="info">
                <div class="label">الدور:</div>
                <div class="value">{{ ucfirst($user->role) }}</div>
            </div>

            <a href="{{ route('users.index') }}" class="btn">العودة لقائمة المستخدمين</a>
        </div>
    </div>
</x-app-layout>
