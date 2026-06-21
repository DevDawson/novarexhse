<?php

namespace App\Http\Controllers;

use App\Models\AnalyticsEvent;
use App\Models\ProfileLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GoController extends Controller
{
    public function redirect(Request $request, int $id): RedirectResponse
    {
        $link = ProfileLink::where('id', $id)->where('is_active', 1)->first();

        if (!$link) {
            return redirect()->route('links');
        }

        ProfileLink::where('id', $id)->increment('clicks');

        AnalyticsEvent::track('/go/' . $id, '', 'link_click');

        return redirect()->away($link->url);
    }
}
