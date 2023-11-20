<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactUs;
use App\Mail\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Modules\Article\Models\Post;
use Modules\Category\Models\Category;
use Modules\Subscriber\Models\Subscriber;
use Modules\Tag\Models\Tag;
class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('verify.email');
    }
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
        $popularPosts = Post::popular()->take(5)->get();


        return view('frontend.index', compact('categoriesWithMostPosts', 'featuredPosts', 'tags', 'recentPosts', 'popularPosts'));
    }

    /**
     * Privacy Policy Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $categories = Category::withCount('posts')->get();
        return view('frontend.categories', compact('categories'));
    }

    /**
     * Terms & Conditions Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function posts($catId = null)
    {
        if ($catId) {
            $posts = Post::where('category_id', '=', $catId)->paginate(6);
        } else {
            $posts = Post::paginate(6);
        }
        $popularPosts = Post::popular()->take(5)->get();
        $featuredPosts = Post::featured()->take(5)->get();

        return view('frontend.posts', compact('posts', 'popularPosts', 'featuredPosts'));
    }
    public function postShow($id)
    {
        $post = Post::find($id);
        $post->hits = $post->hits + 1;
        $post->save();
        return view('frontend.postsShow', compact('post'));
    }
    public function contactUs()
    {
        return view('frontend.contactUs');
    }
    public function contacted(Request $request)
    {
        Mail::to("nostalginescape@gmail.com")->send(new ContactUs($request));
        return to_route('frontend.contactUs');
    }
    public function subscribed(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        Mail::to($request->email)->send(new Subscription());
        $subscriber = new Subscriber;
        $subscriber->email = $request->email;
        $subscriber->name = $request->name;
        $subscriber->save();
        return to_route('frontend.index');

    }
}
