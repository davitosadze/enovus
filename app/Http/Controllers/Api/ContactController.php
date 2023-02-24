<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(ContactRequest $request)
    {
        Contact::create($request->all());
        return response()->json(["success" => true, "message" => "Email Sent Successfully"]);
    }
}
