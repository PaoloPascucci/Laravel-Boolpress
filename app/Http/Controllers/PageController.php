<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Mail\MarkdownContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{

    public function contacts(){
        return view('guest.contacts.form');
    }
    public function sendContactsForm(Request $request)
    {
        $valData = $request->validate([
            'name' => 'required|min:4|max:50',
            'email'=> 'required|email',
            'note' => 'required|min:50|max:500'
        ]);
    
        //Mail::to('admin@example.com')->send(new ContactFormMail($valData));
        //Mail::to('admin@example.com')->send(new MarkdownContactFormMail($valData));

        return (new MarkdownContactFormMail($valData))->render();
        
     return redirect()->back()->with('message', 'Thanks for your message. We will never get back to ya! 😮');
    }
}
