<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Blog;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    //
    public function home_index()
    {
        //
        $success = 'Herzlichen Willkommen im Laravel-Template Starter Eleven';
        Session::flash('toast.info', $success);
        //
        return Inertia::render('Homepage/Home');
    }
    //
    public function home_blog_index()
    {
        $zeitpunkt = Carbon::now();
        //
        $blogs = Blog::select(
            'blogs.id as id',
            'blogs.blog_date as blog_date',
            'blogs.title as title',
            'blogs.slug as slug',
            'blogs.summary as summary',
            'blogs.reading_time as reading_time',
            'blog_authors.name as author_name',
            'blog_images.url as url',
            'blog_images.name as name',
            'blog_categories.name as category_name',
        )
            ->join('blog_authors', 'blog_authors.id', '=', 'blogs.blog_author_id')
            ->join('blog_images', 'blog_images.id', '=', 'blogs.blog_image_id')
            ->join('blog_categories', 'blog_categories.id', '=', 'blogs.blog_category_id')
            //
            ->whereDate('blog_date', '<=', $zeitpunkt)
            //
            ->filterBlog(Request::only('search'))
            ->orderBy('blogs.blog_date', 'desc')
            ->orderBy('blogs.id', 'desc')
            ->paginate(100)
            ->withQueryString();
        //
        return Inertia::render('Homepage/BlogList', [
            'filters' => Request::all('search'),
            'blogs' => $blogs,
        ]);
    }
    //
    public function home_blog_show($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        //
        $blog->blog_author;
        $blog->blog_image;
        $blog->blog_category;
        $blogarticle = null;
        //
        if ($blog->markdown_on) {
            $filePathName = 'blogs/blog_' . $blog->id . '.md';
            $blogarticleFile = Jetstream::localizedMarkdownPath($filePathName);
            $blogarticle = Str::markdown(file_get_contents($blogarticleFile));
        }
        //
        return Inertia::render('Homepage/BlogShow', [
            'blog' => $blog,
            'blogarticle' => $blogarticle
        ]);
    }
    //
    public function home_get_started()
    {
        $getStartedFile = Jetstream::localizedMarkdownPath('get_started.md');
        $getStarted = Str::markdown(file_get_contents($getStartedFile));
        //
        return Inertia::render('Homepage/GetStarted', [
            'get_started' => $getStarted,
        ]);
    }
    //
    public function home_pricing()
    {
        return Inertia::render('Homepage/Pricing');
    }
    //
    public function home_imprint()
    {
        $imprintFile = Jetstream::localizedMarkdownPath('imprint.md');
        $imprint = Str::markdown(file_get_contents($imprintFile));
        //
        return Inertia::render('Homepage/Imprint', [
            'imprint' => $imprint,
        ]);
    }
    //
    public function home_privacy()
    {
        $privacyFile = Jetstream::localizedMarkdownPath('privacy.md');
        $privacy = Str::markdown(file_get_contents($privacyFile));
        //
        return Inertia::render('Homepage/Privacy', [
            'privacy' => $privacy,
        ]);
    }

    public function home_terms()
    {
        $termsFile = Jetstream::localizedMarkdownPath('terms.md');
        $terms = Str::markdown(file_get_contents($termsFile));
        //
        return Inertia::render('Homepage/Terms', [
            'terms' => $terms,
        ]);
    }

    public function home_no_application_found()
    {
        return Inertia::render('Homepage/NoApplicationFound');
    }

    public function home_user_is_no_admin()
    {
        return Inertia::render('Homepage/UserIsNoAdmin');
    }

    public function home_user_is_no_employee()
    {
        return Inertia::render('Homepage/UserIsNoEmployee');
    }

    public function home_user_is_no_customer()
    {
        return Inertia::render('Homepage/UserIsNoCustomer');
    }

    public function home_invalid_signature()
    {
        return Inertia::render('Homepage/InvalidSignature');
    }


}
