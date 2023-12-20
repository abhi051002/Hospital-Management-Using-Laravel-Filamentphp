<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyEmailController extends Controller
{
    // public function sendMail(){
    //     return view('welcome');
    // }
    const $appointment = Appointment::create($input);
    Maill::send('emails.appointmentCreated');
}
