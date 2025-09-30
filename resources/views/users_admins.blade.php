<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('المستخدمين') }}
        </h2>
    </x-slot>

    <style>
        /* جدول مرتب */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-family: 'Cairo', sans-serif;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #0072ff;
            color: #fff;
            font-weight: 600;
        }
        tr:hover { background-color: #f1f1f1; }

        /* الأزرار */
        .btn {
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
        }
        .btn-edit { background-color: #00c6ff; color: #fff; }
        .btn-edit:hover { background-color: #0072ff; }
        .btn-delete { background-color: #ff4e50; color: #fff; }
        .btn-delete:hover { background-color: #d43f3a; }
        .btn-profile { background-color: #6c757d; color: #fff; }
        .btn-profile:hover { background-color: #495057; }
    </style>

    <div class="container mx-auto p-6">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="card overflow-x-auto">
            <table>
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>البريد الإلكتروني</th>
                        <th>العمر</th>
                        <th>الجنس</th>
                        <th>الدور</th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->age ?? 'غير محدد' }}</td>
                        <td>{{ $user->gender ?? 'غير محدد' }}</td>
                        <td>{{ ucfirst($user->role) }}</td>
                        <td class="flex justify-center gap-2">
                           
                            @if($user->role == 'admin')
                             <form action="{{ route('admin.delete', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-edit" onclick="return confirm('هل أنت متأكد من إزالة هذا الادمن؟ ')">
                                        حذف لأدمن
                                    </button>
                                </form>
                            @endif
                        
                        <!-- زر الترقية لأدمن -->
                            @if($user->role !== 'admin')
                                <form action="{{ route('users.promote', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-edit" onclick="return confirm('هل أنت متأكد من ترقية هذا المستخدم لأدمن؟')">
                                        ترقية لأدمن
                                    </button>
                                </form>
                            @endif

                            <!-- زر حذف المستخدم -->
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟')">
                                    حذف
                                </button>
                            </form>

                            <!-- زر زيارة الملف الشخصي -->
                            <a href="{{ route('users.show', $user->id) }}" class="btn btn-profile">الملف الشخصي</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
