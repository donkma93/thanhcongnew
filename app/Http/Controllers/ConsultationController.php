<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'destination' => 'nullable|string|max:100',
            'message' => 'nullable|string',
        ]);

        Consultation::create($validated);

        return redirect()->back()->with('success', 'Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ sớm nhất.');
    }
}
