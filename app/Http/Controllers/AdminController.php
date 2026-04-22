<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function templates(Request $request)
    {
        $token = (string) $request->query('token', '');
        $allowed =
            app()->environment('local') ||
            ($token !== '' && hash_equals((string) env('SCRAPE_TOKEN', ''), $token));

        if (! $allowed) {
            abort(403);
        }

        $path = 'scrapes/makemykankotri/templates.json';

        $data = Storage::disk('local')->exists($path)
            ? json_decode(Storage::disk('local')->get($path), true)
            : null;

        return view('admin.templates', [
            'meta' => is_array($data) ? $data : [],
        ]);
    }
}

