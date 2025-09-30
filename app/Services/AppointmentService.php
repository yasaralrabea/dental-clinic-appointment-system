<?php
namespace App\Services;

use App\Repositories\AppointmentRepository;
use Illuminate\Support\Facades\Auth;

class AppointmentService
{
    protected $appointmentRepo;

    public function __construct(AppointmentRepository $appointmentRepo)
    {
        $this->appointmentRepo = $appointmentRepo;
    }

    public function getAllAvailableDates()
    {
        return $this->appointmentRepo->getAllAvailableDates();
    }

    public function getAvailableTimes($date)
    {
        return $this->appointmentRepo->getAvailableTimesByDate($date);
    }

    public function getMyAppointments()
    {
        $user = Auth::user();
        return $this->appointmentRepo->getUserAppointments($user->id);
    }

    public function bookAppointment($request)
    {
        $user = Auth::user();

        $appointmentData = [
            'name' => $request->name,
            'user_id' => $user->id,
            'gender' => $request->gender,
            'age' => $request->age,
            'email' => $user->email,
            'medical_condition' => $request->medical_condition,
            'date' => $request->appointment_date,
            'time' => $request->appointment_time,
            'price' => $request->price,
            'n_id' => $request->n_id,
        ];

        $appointment = $this->appointmentRepo->createAppointment($appointmentData);

        $this->appointmentRepo->deleteAvailableSlot($request->appointment_date, $request->appointment_time);

        return $appointment;
    }
}
