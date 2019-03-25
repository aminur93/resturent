<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->get();
        return view('admin.reservation.index',compact('reservations'));
    }
    
    public function status($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        
        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());
        
        Toastr::success('Reservation is Confirmed','success');
        
        return redirect()->back();
    }
    
    public function destroy($id)
    {
        Reservation::findOrFail($id)->delete();
        
        Toastr::success('Reservation is Deleted Successfully!!','success');
    
        return redirect()->back();
    }
}
