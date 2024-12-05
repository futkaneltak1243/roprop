<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('control.doctors', compact('doctors'));
    }
}
