<?php

namespace App\Http\Controllers;

use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $appointmentService;

    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    public function create()
    {
        $user = auth()->user();
        $all_dates = $this->appointmentService->getAllAvailableDates();
        return view('avillable_oppintments', compact('all_dates', 'user'));
    }

    public function my_apps()
    {
        $appointments = $this->appointmentService->getMyAppointments();
        return view('my_appointments', compact('appointments'));
    }

    public function avillable_time(Request $request)
    {
        $times = $this->appointmentService->getAvailableTimes($request->date);
        return response()->json(['times' => $times]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string',
            'age' => 'required|integer|min:1',
            'medical_condition' => 'required|string',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|string',
        ]);

        $this->appointmentService->bookAppointment($request);

        return view('sucss', ['message' => 'تم حجز الموعد بنجاح']);
    }
}
