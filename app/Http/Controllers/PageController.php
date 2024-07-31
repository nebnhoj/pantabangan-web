<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Inertia\Inertia;

class PageController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'title' => 'Welcome to Pantabangan.com',
            'metaDescription' => 'Explore the natural beauty and rich culture of Pantabangan, Nueva Ecija.'
        ]);
    }

    public function about()
    {
        return Inertia::render('About', [
            'title' => 'Pantabangan.com | About',
            'metaDescription' => 'Learn about Pantabangan, a picturesque municipality in Nueva Ecija known for its rich history, scenic attractions, and cultural heritage. Discover the story behind its development, the significance of Pantabangan Dam, and the local traditions that shape this vibrant community.'
        ]);
    }

    public function attractions()
    {
        return Inertia::render('Attractions', [
            'title' => 'Pantabangan.com | Attractions',
            'metaDescription' => 'Discover the top tourist attractions in Pantabangan, Nueva Ecija, including the stunning Pantabangan Dam, serene Intang Lake, and more. Explore natural wonders and enjoy recreational activities in this beautiful destination.'
        ]);
    }

    public function attractionView(Request $request, string $slug)
    {

        return Inertia::render('AttractionItem', [
            'title' => 'Pantabangan.com | Attractions',
            'metaDescription' => 'Discover the top tourist attractions in Pantabangan, Nueva Ecija, including the stunning Pantabangan Dam, serene Intang Lake, and more. Explore natural wonders and enjoy recreational activities in this beautiful destination.',
            'slug' =>$slug
        ]);
    }

    public function blogs()
    {
        return Inertia::render('Blogs', [
            'title' => 'Pantabangan.com | Blogs ',
            'metaDescription' => 'Stay informed with the latest stories about Pantabangan, Nueva Ecija. Our blog covers a wide range of topics, including local events, cultural highlights, travel tips, and more.'
        ]);
    }

    public function blogView(Request $request, string $slug)
    {
        return Inertia::render('BlogItem', [
            'title' => 'Pantabangan.com | Blogs ',
            'metaDescription' => 'Stay informed with the latest stories about Pantabangan, Nueva Ecija. Our blog covers a wide range of topics, including local events, cultural highlights, travel tips, and more.',
       'slug' =>$slug
        ]);
    }

    public function news()
    {
        return Inertia::render('News', [
            'title' => 'Pantabangan.com | News',
            'metaDescription' => 'Get the latest news and updates from Pantabangan, Nueva Ecija. Stay informed about local developments, community announcements, important events, and other newsworthy happenings in the region.'
        ]);
    }
}
