<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TemplateController extends Controller
{
    private function loadTemplatesData(): array
    {
        $path = 'scrapes/makemykankotri/templates.json';

        $data = Storage::disk('local')->exists($path)
            ? json_decode(Storage::disk('local')->get($path), true)
            : null;

        return is_array($data) ? $data : [];
    }

    public function index()
    {
        $data = $this->loadTemplatesData();

        $templates = is_array($data['templates'] ?? null) ? $data['templates'] : [];

        return view('templates.index', [
            'templates' => $templates,
            'meta' => [
                'sourceUrl' => $data['sourceUrl'] ?? null,
                'scrapedAt' => $data['scrapedAt'] ?? null,
            ],
        ]);
    }

    public function show(string $id)
    {
        $data = $this->loadTemplatesData();
        $templates = is_array($data['templates'] ?? null) ? $data['templates'] : [];

        $template = null;
        foreach ($templates as $t) {
            if (($t['id'] ?? null) === $id) {
                $template = $t;
                break;
            }
        }

        abort_if(! is_array($template), 404);

        return view('templates.show', [
            'template' => $template,
            'whatsappNumber' => '9328967012',
        ]);
    }
}

