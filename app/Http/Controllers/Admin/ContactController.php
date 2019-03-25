<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.index',compact('contacts'));
    }
    
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.show',compact('contact'));
    }
    
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        
        Toastr::success('Contact Delete Successfully!!','success');
        
        return redirect()->back();
    }
}
