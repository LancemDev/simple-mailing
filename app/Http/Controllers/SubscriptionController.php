<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipient;

class SubscriptionController extends Controller
{
    public function index($email)
    {
        $recipient = Recipient::where('email', $email)->first();

        if ($recipient) {
            return response()->json([
                'message' => 'You are already subscribed to our newsletter.'
            ], 200);
        }

        Recipient::create([
            'email' => $email
        ]);

        return response()->json([
            'message' => 'You have been successfully subscribed to our newsletter.'
        ], 201);
    }
}
