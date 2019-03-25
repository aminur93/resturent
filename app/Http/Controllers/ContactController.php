<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function Add_contact(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email|required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();
        
        Toastr::success('Message sent Successfully','success');
        
        return redirect()->back();
    }
}
