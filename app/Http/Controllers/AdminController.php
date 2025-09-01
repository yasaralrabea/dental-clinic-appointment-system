<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apps;  
use App\Models\Avillable;  
use App\Models\Doctor;   
use App\Models\User;   
use App\Models\Appointment;  
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    
   
    public function show_doctors()
    {
        $doctors = Doctor::all();
        return view('doctors', compact('doctors'));

    }

     public function add_doctors()
    {
        $doctors = Doctor::all();
        return view('add_doctors', compact('doctors'));

    }

    public function add_doctor(Request $request)
    {
        Doctor::create([

            'name'=>$request->name,
            'cv'=>$request->cv,
            'phone'=>$request->phone,
            'expertise'=>$request->expertise,
            'specialty'=>$request->specialty,
            'Employment_date'=>$request->Employment_date,
            'Contract_duration'=>$request->Contract_duration,
            'email'=>$request->email,

]);
            return redirect()->back()->with('success', 'تم الإضافة بنجاح');

    }
    

    public function patient_appointments()
    {
         $appointments = Appointment::all();
     
         return view('patient_appointments', compact('appointments'));
    }

    public function index()
    {
         $appointments = Avillable::all();
 
         return view('doctor_appointments', compact('appointments'));
    }

    public function store(Request $request)
    {
   
        Avillable::create([
        'date' => $request->appointment_date,
        'time' => $request->appointment_time,

        ]);
        return redirect()->back()->with('success', 'تم إتاحة الموعد بنجاح');


    }

    public function destroy($id)
        {
            Avillable::find($id)->delete();
            return redirect()->back()->with('success', 'تم الحذف بنجاح');


        }   
    
    public function destroy_a($id)
    {
        $appointment=Appointment::find($id);
        $appointment->appointment_condition='deleted';
        $appointment->save();
        $appointment->delete();

        return redirect()->back()->with('success', 'تم الحذف بنجاح');


    }

    public function done($id)
    {
        $appointment=Appointment::find($id);
        $appointment->appointment_condition='done';
        $appointment->save();
        $appointment->delete();

        return redirect()->back()->with('success', 'تم الموعد بنجاح');


    }

    public function controll()
    {
        $doctors=Doctor::all();
        return view('doctor_controll', compact('doctors'));

    }


    public function destroy_d($id)
        {
            Serve::find($id)->delete();
            return redirect()->back()->with('success', 'تم الحذف بنجاح');


        }


    
    public function get_admin_name()
        {
            $name = Auth::user()->name;
            return view('admin_home', compact('name'));
        }

     public function users()
     {
        $users=User::all();
        return view('users_admins', compact('users'));

     }

     public function admin_delete($id)
     {
        $admin=User::find($id);

        $admin->role='user';
        $admin->save();
         return redirect()->back()->with('success', 'تم حذف الأدمن بنجاح.');
       
     }

     public function all()
     {
        $appointments = Appointment::withTrashed()->get();
        return view('all_appointments',compact('appointments'));
     }
}
