<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class PageController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'title' => 'Welcome to Pantabangan',
            'metaDescription' => 'Explore the natural beauty and rich culture of Pantabangan, Aurora.'
        ]);
    }

    public function about()
    {
        return Inertia::render('About');
    }

    public function attractions()
    {
        return Inertia::render('Attractions');
    }

    public function blogs()
    {
        return Inertia::render('Blogs');
    }

    public function news()
    {
        return Inertia::render('News');
    }
}
