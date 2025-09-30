<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <style>
                * { margin:0; padding:0; box-sizing:border-box; font-family:'Cairo', sans-serif; }
                body { background:#f5f7fa; color:#333; direction:rtl; }

                #search {
                    width:60%;
                    padding:10px 15px;
                    border-radius:10px;
                    border:1px solid #ccc;
                    box-shadow:0 2px 8px rgba(0,0,0,0.1);
                    margin:20px auto;
                    display:block;
                }

                .appointment-lists { display:flex; flex-direction:column; gap:25px; }

                /* تصميم عنوان القسم */
                .list h2 {
                    font-size:22px;
                    color:#0072ff;
                    margin-bottom:5px;
                    padding:10px 15px;
                    padding-left:35px; /* مسافة من اليسار */
                    cursor:pointer;
                    user-select:none;
                    background:#f0f4ff;
                    border-radius:8px;
                    display:flex;
                    align-items:center;
                    justify-content:space-between;
                    transition:background 0.2s;
                }
                .list h2:hover { background:#e0e8ff; }

                .list h2 .arrow {
                    display:inline-block;
                    transition: transform 0.3s;
                    margin-left:10px;
                }

                .list ul { display:none; flex-direction:column; gap:10px; margin-top:5px; }

                .list ul li {
                    display:flex;
                    justify-content:space-between;
                    align-items:center;
                    padding:10px 15px;
                    border-radius:8px;
                    background:#fdfdfd;
                    border-left:5px solid;
                    transition:all 0.2s;
                    box-shadow:0 1px 3px rgba(0,0,0,0.08);
                }

                .list ul li[data-status="تم"] { border-color:#28a745; }
                .list ul li[data-status="ملغي"] { border-color:#dc3545; }
                .list ul li[data-status="لم يأت"] { border-color:#ffc107; }

                .list ul li:hover { transform:translateY(-2px); box-shadow:0 4px 12px rgba(0,0,0,0.1); }

                .appointment-item { display:flex; gap:15px; flex-wrap:wrap; width:100%; }
                .appointment-item div { min-width:120px; }

                </style>

                <h1 class="text-3xl font-bold mb-6 text-center" style="color:#0072ff;">قائمة المواعيد</h1>

                <input type="text" id="search" placeholder="ابحث باسم المريض...">

                <div class="appointment-lists">
                    @php
                        $doneAppointments = $appointments->filter(fn($a) => $a->appointment_condition == 'done');
                        $deletedAppointments = $appointments->filter(fn($a) => $a->appointment_condition == 'deleted');
                        $noShowAppointments = $appointments->filter(fn($a) => $a->appointment_condition == 'didint_come');
                    @endphp

                    <div class="list">
                        <h2>
                            تمت 
                            <span class="arrow">▶</span>
                        </h2>
                        <ul>
                            @foreach($doneAppointments as $appointment)
                                <li data-name="{{ $appointment->name }}" data-status="تم">
                                    <div class="appointment-item">
                                        <div><strong>المريض:</strong> {{ $appointment->name }}</div>
                                        <div><strong>التاريخ:</strong> {{ $appointment->date }}</div>
                                        <div><strong>الوقت:</strong> {{ $appointment->time }}</div>
                                        <div><strong>الحالة:</strong> {{ $appointment->appointment_condition }}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="list">
                        <h2>
                            ملغي 
                            <span class="arrow">▶</span>
                        </h2>
                        <ul>
                            @foreach($deletedAppointments as $appointment)
                                <li data-name="{{ $appointment->name }}" data-status="ملغي">
                                    <div class="appointment-item">
                                        <div><strong>المريض:</strong> {{ $appointment->name }}</div>
                                        <div><strong>التاريخ:</strong> {{ $appointment->date }}</div>
                                        <div><strong>الوقت:</strong> {{ $appointment->time }}</div>
                                        <div><strong>الحالة:</strong> {{ $appointment->appointment_condition }}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="list">
                        <h2>
                            لم يأت 
                            <span class="arrow">▶</span>
                        </h2>
                        <ul>
                            @foreach($noShowAppointments as $appointment)
                                <li data-name="{{ $appointment->name }}" data-status="لم يأت">
                                    <div class="appointment-item">
                                        <div><strong>المريض:</strong> {{ $appointment->name }}</div>
                                        <div><strong>التاريخ:</strong> {{ $appointment->date }}</div>
                                        <div><strong>الوقت:</strong> {{ $appointment->time }}</div>
                                        <div><strong>الحالة:</strong> {{ $appointment->appointment_condition }}</div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const searchInput = document.getElementById('search');

                    // البحث عن طريق الاسم
                    searchInput.addEventListener('keyup', function() {
                        const filter = this.value.toLowerCase();
                        document.querySelectorAll('.list ul li').forEach(item => {
                            const name = item.dataset.name.toLowerCase();
                            item.style.display = name.includes(filter) ? 'flex' : 'none';
                        });
                    });

                    // فتح/إغلاق القوائم مع دوران السهم
                    document.querySelectorAll('.list h2').forEach(header => {
                        header.addEventListener('click', () => {
                            const ul = header.nextElementSibling;
                            const arrow = header.querySelector('.arrow');
                            if (ul.style.display === 'flex') {
                                ul.style.display = 'none';
                                arrow.style.transform = 'rotate(0deg)';
                            } else {
                                ul.style.display = 'flex';
                                arrow.style.transform = 'rotate(90deg)';
                            }
                        });
                    });
                });
                </script>

            </div>
        </div>
    </div>
</x-app-layout>
