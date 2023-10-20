<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Article\Models\Post;
use Modules\Category\Models\Category;
use Modules\Tag\Models\Tag;

class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriesWithMostPosts = Category::select('categories.*')
        ->addSelect(DB::raw('(SELECT COUNT(*) FROM posts WHERE posts.category_id = categories.id) as post_count'))
        ->orderByDesc('post_count')
        ->take(5)
        ->get();
        $featuredPosts = Post::featured()->take(5)->get();
        $tags = Tag::take(12)->get();
        $recentPosts = Post::recentlyPublished()->paginate(5);


        return view('frontend.index', compact('categoriesWithMostPosts', 'featuredPosts', 'tags', 'recentPosts'));
    }

    /**
     * Privacy Policy Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
        return view('frontend.privacy');
    }

    /**
     * Terms & Conditions Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function terms()
    {
        return view('frontend.terms');
    }
}
