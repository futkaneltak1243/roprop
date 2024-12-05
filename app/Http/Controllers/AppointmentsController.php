<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function showAppointmentsPage()
    {
        $appointments = Appointment::where('appointment_date', '>', now('Europe/Istanbul'))->get();
        return view('control.appointments', compact('appointments'));
    }

    public function addAppointmentPage()
    {
        $doctors = Doctor::all();
        return view('control.add_appointment', compact('doctors'));
    }

    public function addAppointment(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'doctor_name' => 'required|exists:doctors,id', // Ensure the doctor exists in the doctors table
            'condition' => 'required|string|max:500',
            'phone_number' => 'required|digits_between:7,15', // Validate phone number format
            'appointment_date' => 'required|date|after_or_equal:today', // Ensure the date is valid and not in the past
        ]);

        // If validation passes, create the appointment
        $appointment = new Appointment();
        $appointment->full_name = $validatedData['full_name'];
        $appointment->doctor_id = $validatedData['doctor_name'];
        $appointment->condition = $validatedData['condition'];
        $appointment->phone_number = $validatedData['phone_number'];
        $appointment->appointment_date = $validatedData['appointment_date'];

        if ($appointment->save()) {
            return redirect()->back()->with('message', 'Appointment created successfully!');
        }
        return redirect()->back()->with('error', 'Unable to create appointment. Please try again.');
    }

    public function editAppointmentPage($id)
    {
        $appointment = Appointment::where('id', $id)->first();
        $doctors = Doctor::all();

        return view('control.editAppointment', compact('appointment', 'doctors'));
    }

    public function editAppointment(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $appointment->full_name = $request->full_name;
        $appointment->doctor_id = $request->doctor_name;
        $appointment->condition = $request->condition;
        $appointment->phone_number = $request->phone_number;
        $appointment->appointment_date = $request->appointment_date;
        if ($appointment->save()) {
            return redirect()->back()->with('message', 'Appointment updated successfully!');
        }
        return redirect()->back()->with('error', 'Unable to update appointment. Please try again.');
    }

    public function deleteAppointment(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $appointment->delete();
        return redirect()->route('appointments');
    }
}
