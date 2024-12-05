<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function doctorSearch(Request $request)
    {
        $doctors = Doctor::where('name', $request->name)->get();
        return view('control.doctors', compact('doctors'));
    }

    public function appointmentSearch(Request $request)
    {

        $doctor = Doctor::where('name', $request->name)->first();
        $doctor_id = $doctor->id;
        $appointments = Appointment::where('doctor_id', $doctor_id)->get();

        return view('control.appointments', compact('appointments'));
    }

    public function adminSearch(Request $request)
    {
        $admins = User::where('name', $request->name)->get();
        return view('control.admins', compact('admins'));
    }
}
