<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactEmail;
use App\Http\Requests\ContactFormRequest;

class ContactController extends Controller
{
    public function create() {
        return view ('partials.contact-create');
    }
    
    public function store(ContactFormRequest $request) {
        $contact = [];
        
//        $this->validate($request, [
//            'name' =>
//                array(
//                    'required',
//                    'regex:/(^[A-Za-z ]+$)+/'
//                    ),
//            'email' => 'required|email',
//            'message' =>
//                array(
//                    'required',
//                    'regex:/(^[A-Za-z0-9 ]+$)+/'
//                    )
//        ]);
        
        $contact['name'] = $request->input('contactName');
        $contact['email'] = $request->input('contactEmail');
        $contact['message'] = $request->input('contactMessage');
        
        Mail::to(config('mail.from.address'))->send(new ContactEmail($contact));
        
        return redirect()->route('contact.create')->with('success', 'Your message has been sent!');
    }
}
