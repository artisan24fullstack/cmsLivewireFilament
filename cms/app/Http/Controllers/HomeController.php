<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request):View
    {

        /**
         * 7 statements were executed, 2 of which were duplicates, 5 unique. Show only duplicated
         *
         * with cache 3 statements were executed, 2 of which were duplicates, 1 unique. Show only duplicated
         */
        $featuredPosts = Cache::remember('featuredPosts', now()->addDay(), function () {
            return Post::published()->featured()->with('categories')->latest('published_at')->take(3)->get();
        });

        $latestPosts = Cache::remember('latestPosts', now()->addDay(), function () {
            return Post::published()->with('categories')->latest('published_at')->take(6)->get();
        });

        return view('home', [
            'featuredPosts' => $featuredPosts,
            'latestPosts' => $latestPosts
        ]);
    }
}
