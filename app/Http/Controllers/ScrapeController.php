<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ScrapeController extends Controller
{
    public function run(Request $request)
    {
        $token = (string) $request->input('token', '');
        $allowed =
            app()->environment('local') ||
            ($token !== '' && hash_equals((string) env('SCRAPE_TOKEN', ''), $token));

        if (! $allowed) {
            abort(403);
        }

        $exitCode = Artisan::call('scrape:makemykankotri');
        $output = Artisan::output();

        return back()->with([
            'scrape_exit_code' => $exitCode,
            'scrape_output' => $output,
        ]);
    }
}

