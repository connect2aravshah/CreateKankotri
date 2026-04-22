<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RsvpController extends Controller
{
    public function store(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['nullable', 'string', 'max:30'],
            'guests' => ['nullable', 'integer', 'min:1', 'max:50'],
            'message' => ['nullable', 'string', 'max:500'],
        ]);

        $payload = [
            'id' => (string) $id,
            'submittedAt' => now()->toIso8601String(),
            'ip' => $request->ip(),
            'userAgent' => (string) $request->userAgent(),
            'data' => $data,
        ];

        $dir = "rsvp/{$id}";
        $filename = $dir.'/'.now()->format('Ymd_His').'_'.Str::random(8).'.json';

        Storage::disk('local')->put($filename, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

        return back()->with('rsvp_ok', true);
    }
}

