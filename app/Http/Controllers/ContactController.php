<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInquiryRequest;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    public function submit(ContactInquiryRequest $request): RedirectResponse
    {
        Inquiry::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'company'    => $request->company,
            'service'    => $request->service,
            'message'    => $request->message,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'is_read'    => 0,
        ]);

        return redirect()->back()->with('success', 'Thank you! Your message has been received. We will get back to you shortly.');
    }
}
