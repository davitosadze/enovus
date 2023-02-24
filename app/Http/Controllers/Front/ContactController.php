<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('front.contact.index', compact('contact'));
    }

    public function show(Contact $contact)
    {
        return view('front.contact.show', compact('contact'));
    }
}
