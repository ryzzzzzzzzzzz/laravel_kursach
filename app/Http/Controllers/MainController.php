<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        $json = file_get_contents(public_path('data/news.json'));
        $news = json_decode($json, true);

        return view('pages.home', [
            'news' => $news,
        ]);
    }

    public function gallery($slug)
    {
        $json = file_get_contents(public_path('data/news.json'));
        $news = json_decode($json, true);

        foreach ($news as $item) {
            if ($item['slug'] === $slug) {
                return view('pages.gallery', [
                    'news' => $item,
                ]);
            }
        }

        abort(404);
    }
}