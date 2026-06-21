<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInquiryRequest;
use App\Mail\InquiryNotification;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(ContactInquiryRequest $request): RedirectResponse
    {
        $inquiry = Inquiry::create([
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

        try {
            Mail::to('info@novarex.co.tz')
                ->send(new InquiryNotification($inquiry));
        } catch (\Throwable) {
            // Mail failure must not break the form submission
        }

        return redirect()->back()->with('success', 'Thank you! Your message has been received. We will get back to you shortly.');
    }
}
