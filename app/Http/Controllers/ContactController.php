<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function ContactForm(Request $request)
    {

        $validatedData = $request->validate([
            'username' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'message' => 'nullable|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()]);
        }
        $contact = new Contact();
        $contact->username = $validatedData['username'];
        $contact->email = $validatedData['email'];
        $contact->phone = $validatedData['phone'];
        $contact->subject = $validatedData['subject'];
        $contact->message = $validatedData['message'];
        $contact->save();

        return response()->json(['message' => 'Enquiry Submitted !']);
    }

}