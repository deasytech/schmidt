<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Page;
use App\Models\PageModule;
use App\Models\Project;
use TCG\Voyager\Models\Post;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;
use App\Models\Client;
use App\Models\Team;

class PageController extends Controller
{
    public function index()
    {
        $slides = Slide::all();
        $page = Page::where('slug', '=', 'who-we-are')->first();
        $what_we_do = Page::where('slug', '=', 'what-we-do')->first();
        $what_we_do_modules = PageModule::where('page_id', $what_we_do->id)->orderBy('sub_title')->get();
        $projects = Project::where('featured', 1)->get();
        $how_we_do_it = Page::where('slug', '=', 'how-we-do-it')->first();
        $how_we_do_it_modules = PageModule::where('page_id', $how_we_do_it->id)->get();
        $latest_news = Post::published()->where('featured', 1)->get();
        $more_projects = Project::where('status', 1)->where('featured', 0)->orderByDesc('id')->take(4)->get();
        $team = Team::take(4)->get();
        return view('pages.index', compact('more_projects', 'team', 'page', 'slides', 'what_we_do', 'what_we_do_modules', 'projects', 'how_we_do_it', 'how_we_do_it_modules', 'latest_news'));
    }

    public function theCompany()
    {
        $page = Page::where('slug', '=', 'the-company')->first();
        $modules = PageModule::where('page_id', $page->id)->get();
        $testimonial = Page::where('slug', '=', 'testimonials')->first();
        $testimonials = PageModule::where('page_id', $testimonial->id)->get();
        return view('pages.the-company', compact('page','modules', 'testimonial', 'testimonials'));
    }

    public function whatWeDo()
    {
        $page = Page::where('slug', '=', 'what-we-do')->first();
        $modules = PageModule::where('page_id', $page->id)->orderBy('sub_title')->get();
        return view('pages.what-we-do', compact('page','modules'));
    }

    public function ourTeam()
    {
        $team = Team::all();
        return view('pages.our-team', compact('team'));
    }

    public function ourWorks()
    {
        $works = Project::where('status',1)->get();
        $clients = Client::all();
        return view('pages.our-works', compact('works', 'clients'));
    }

    public function ourWork($id)
    {
        $work = Project::where([['id', $id],['status',1]])->first();
        abort_if(!$work, 404);
        $clients = Client::all();
        $related = Project::where('status', 1)->where('id', '!=', $work->id)
            ->orderByRaw('sub_title = ? desc', [$work->sub_title])->orderByDesc('id')->take(3)->get();
        $prev = Project::where('status', 1)->where('id', '<', $work->id)->orderByDesc('id')->first();
        $next = Project::where('status', 1)->where('id', '>', $work->id)->orderBy('id')->first();
        return view('pages.our-work', compact('work', 'clients', 'related', 'prev', 'next'));
    }

    public function contactUs()
    {
        return view('pages.contact-us');
    }

    public function storeContact(Request $request)
    {
        $receiver = env('MAIL_FROM_ADDRESS');
        
        // Validate the form data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send an email
        Mail::to($receiver)->send(new ContactFormSubmitted($request));

        return redirect()->route('contact-us')->with('success', 'Your message has been sent!');
    }

    public function latestNews()
    {
        $news = Post::published()->orderBy('created_at','desc')->get();
        return view('pages.news', compact('news'));
    }

    public function latestPost($slug)
    {
        $post = Post::published()->where('slug', $slug)->first();
        abort_if(!$post, 404);
        $more = Post::published()->where('id', '!=', $post->id)->orderByDesc('created_at')->take(3)->get();
        return view('pages.news-post', compact('post', 'more'));
    }
}