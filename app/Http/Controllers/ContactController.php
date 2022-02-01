<?php

namespace App\Http\Controllers;

use App\Mail\MarkdownContactFormMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show_contact_page(){
        return view('guest.contacts.form');
    }
    public function store(Request $request)
    {
        $valData = $request->validate([
            'name' => 'required|min:4|max:50',
            'email'=> 'required|email',
            'note' => 'required|min:50|max:500'
        ]);
        
        $contact = Contact::create($valData);
        $this->sendEmail($contact);
        
        
     return redirect()->back()->with('message', 'Thanks for your message. We will never get back to ya! 😮');
    }
    public function sendEmail(Contact $contact){
        //Mail::to('admin@example.com')->send(new ContactFormMail($valData));
        //return (new MarkdownContactFormMail($valData))->render();
        Mail::to('admin@example.com')->send(new MarkdownContactFormMail($contact));

    }
}
