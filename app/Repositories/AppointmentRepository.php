<?php
namespace App\Repositories;

use App\Models\Appointment;
use App\Models\Avillable;
use Illuminate\Support\Facades\Auth;

class AppointmentRepository
{
    public function getAllAvailableDates()
    {
        return Avillable::select('date')->distinct()->get();
    }

    public function getAvailableTimesByDate($date)
    {
        return Avillable::where('date', $date)->pluck('time')->toArray();
    }

    public function getUserAppointments($userId)
    {
        return Appointment::withTrashed()->where('user_id', $userId)->get();
    }

    public function createAppointment($data)
    {
        return Appointment::create($data);
    }

    public function deleteAvailableSlot($date, $time)
    {
        return Avillable::where('date', $date)->where('time', $time)->delete();
    }
}
