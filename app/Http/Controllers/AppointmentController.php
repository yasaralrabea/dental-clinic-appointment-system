<?php

namespace App\Http\Controllers;
use App\Models\Apps;  
use App\Models\Avillable;
use App\Models\Appointment;  
use Illuminate\Support\Facades\Auth; 

use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    
    public function create()
    {
        $user = Auth::user();
        $all_dates = Avillable::select('date')->distinct()->get();
        
        return view('avillable_oppintments', compact('all_dates', 'user'));
    }

    public function my_apps(Request $request)
    {
                $user= Auth::user();
                $userId=$user->id;

        $appointments = Appointment::withTrashed()->where('user_id', $userId)->get();
        return view('my_appointments', compact('appointments'));
    }
   
    public function avillable_time(Request $request)
    {
        $date=$request->input('date');
        $times=Avillable::where('date', $date)->pluck('time')->toarray();
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
         $user = Auth::user();
        Appointment::create([
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
        ]);
         Avillable::where('date', $request->appointment_date)
        ->where('time', $request->appointment_time)
        ->delete();

    
        return view('sucss', ['message' => 'تم حجز الموعد بنجاح']);
    }
    
}
