<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{

    public function addDoctor()
    {
        $message = session('message');
        return view('control.add_doctor', compact('message'));
    }

    public function newDoctor(Request $request)
    {

        // Validate the incoming request data
        $validatedData = $request->validate([
            'image_path' => 'required|image', // Validates file upload
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'birth_date' => 'required|date|before:today',
            'experience' => 'required|integer|min:0',
            'overview' => 'required|string|max:2000',
        ]);

        // Handle file upload
        $imagePath = $request->file('image_path')->store('doctor_images', 'public');

        // Save the doctor's details to the database
        $doctor = new Doctor();
        $doctor->name = $validatedData['name'];
        $doctor->surname = $validatedData['surname'];
        $doctor->specialty = $validatedData['specialty'];
        $doctor->birth_date = $validatedData['birth_date'];
        $doctor->experience = $validatedData['experience'];
        $doctor->overview = $validatedData['overview'];
        $doctor->image_path = $imagePath;


        if ($doctor->save()) {
            // Redirect back with success message
            return redirect()->back()->with('message', 'Doctor added successfully!');
        }
        return redirect()->back()->with('message', 'Doctor creation failed.');
    }

    public function editDoctorPage($id)
    {
        $doctor = Doctor::find($id);
        return view('control.editDoctor', compact('doctor'));
    }

    public function updateDoctor(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'image_path' => 'image', // Validates file upload
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'birth_date' => 'required|date|before:today',
            'experience' => 'required|integer|min:0',
            'overview' => 'required|string|max:2000',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('doctor_images', 'public');
        } else {
            // Retain the old image path
            $imagePath = $request->input('old_image_path');
        }
        // Save the doctor's details to the database
        $doctor = Doctor::find($request->id);
        $doctor->name = $validatedData['name'];
        $doctor->surname = $validatedData['surname'];
        $doctor->specialty = $validatedData['specialty'];
        $doctor->birth_date = $validatedData['birth_date'];
        $doctor->experience = $validatedData['experience'];
        $doctor->overview = $validatedData['overview'];
        $doctor->image_path = $imagePath;
        if ($doctor->save()) {
            // Redirect back with success message
            return redirect()->back()->with('message', 'Doctor updated successfully!');
        }
        return redirect()->back()->with('message', 'process failed.');
    }

    public function deleteDoctor(Request $request)
    {
        $doctor_id = $request->id;
        $doctor = Doctor::findOrFail($doctor_id);
        $doctor->delete();
        return redirect()->route('control');
    }
}
