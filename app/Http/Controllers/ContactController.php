<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;  // Create a Contact model for storing form data

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'message' => 'required|string',
        ]);

        // Store the contact form data in the database
        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'message' => $validated['message'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully!',
        ], 200);
    }
}