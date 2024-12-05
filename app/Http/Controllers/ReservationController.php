<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Termwind\Components\Raw;
use DateTime;
use DateInterval;

class ReservationController extends Controller
{
    public function get_dates($excludedTimes)
    {
        function getNextBusinessDays($startDate, $days = 7)
        {
            $businessDays = [];
            $date = new DateTime($startDate);

            while (count($businessDays) < $days) {
                if (!in_array($date->format('N'), [6, 7])) { // Exclude Saturday (6) and Sunday (7)
                    $businessDays[] = $date->format('Y-m-d');
                }
                $date->modify('+1 day');
            }

            return $businessDays;
        }

        function generateTimeSlots($businessDays, $excludedTimes)
        {
            $timeSlots = [];
            $startTime = new DateTime('12:00');
            $endTime = new DateTime('17:00');
            $interval = new DateInterval('PT20M'); // 20-minute gap

            foreach ($businessDays as $day) {
                $slots = [];
                $currentTime = clone $startTime;

                while ($currentTime < $endTime) {
                    $timeSlot = $day . ' ' . $currentTime->format('H:i');
                    if (!in_array($timeSlot, $excludedTimes)) {
                        $slots[] = $timeSlot;
                    }
                    $currentTime->add($interval);
                }

                $timeSlots[$day] = $slots;
            }

            return $timeSlots;
        }


        // Generate next 7 business days starting from today
        $startDate = date('Y-m-d', strtotime('tomorrow'));
        $businessDays = getNextBusinessDays($startDate);

        // Generate time slots excluding the given times
        $timeSlots = generateTimeSlots($businessDays, $excludedTimes);

        return $timeSlots;
    }



    public function showDoctors()
    {
        $doctors = Doctor::inRandomOrder()->get();
        return view('appointment.doctor', compact('doctors'));
    }

    public function showDoctorInfo($id)
    {
        $doctor = Doctor::find($id);
        return view('appointment.doc_info', compact('doctor'));
    }

    public function takeDate($id)
    {
        $appointments = Appointment::where('doctor_id', $id)
            ->whereDate('appointment_date', '>=', now('Europe/Istanbul'))
            ->orderBy('appointment_date', 'asc') // Use 'asc' for ascending order or 'desc' for descending
            ->get();

        $appointments_date = array();
        foreach ($appointments as $appointment) {
            array_push($appointments_date, str_replace('T', ' ', $appointment->appointment_date));
        }

        $available_dates = json_encode($this->get_dates($appointments_date));


        return view('appointment.date', ['id' => $id], compact('available_dates'));
    }

    public function makeAppointment(Request $request)
    {

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'doctor_id' => 'required|exists:doctors,id', // assuming you have a doctors table
            'condition' => 'required|string|max:255',
            'phone_number' => 'required', // validate phone number format
            'appointment_date' => 'required|date', // ensure the appointment date is unique
        ]);



        // Create a new appointment
        $appointment = new Appointment();
        $appointment->full_name = $request->full_name;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->condition = $request->condition;
        $appointment->phone_number = $request->phone_number;
        $appointment->appointment_date = $request->appointment_date;

        $date_to_check = str_replace('T', ' ', $appointment->appointment_date);
        $found = false;
        $available_dates = json_decode($request->available_dates);
        foreach ($available_dates as $dates) {
            if (in_array($date_to_check, $dates)) {
                $found = true;
                break;
            }
        }

        if (!$found) {
            return redirect()->back()->with('error', 'Please select an available appointment from the table.');
        }
        // Save the appointment

        if ($appointment->save()) {
            return view('appointment.own_appointment', compact('appointment'));
        }
        return redirect()->back()->with('error', 'Appointment creation failed.');
    }
}
