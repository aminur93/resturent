<?php

namespace App\Http\Controllers;

use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function reserve(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'date_time' => 'required',
            'message' => 'required'
        ]);
        
        $reserve = new Reservation();
        $reserve->name = $request->name;
        $reserve->email = $request->email;
        $reserve->phone = $request->phone;
        $reserve->date_time = $request->date_time;
        $reserve->message = $request->message;
        $reserve->status = false;
        $reserve->save();
        
        Toastr::success('Reservation request send succesfully. We will confirm to you shortly','success');
        
        return redirect()->back();
    }
}
