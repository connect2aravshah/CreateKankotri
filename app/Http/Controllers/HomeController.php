<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $path = 'scrapes/makemykankotri/templates.json';

        $data = Storage::disk('local')->exists($path)
            ? json_decode(Storage::disk('local')->get($path), true)
            : null;

        $templates = is_array($data['templates'] ?? null) ? $data['templates'] : [];

        return view('home', [
            'templateCount' => count($templates),
            'featuredTemplates' => array_slice($templates, 0, 8),
        ]);
    }
}

