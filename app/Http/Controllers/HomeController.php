<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Posts;
use App\Models\Listings;
use Helper;
use Illuminate\Http\Request;
use App\User;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\URL;
use App\Models\CommentNews;
use App\Models\CommentReply;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_ip = getenv('REMOTE_ADDR');
        try {
            $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
            $country = $geo["geoplugin_countryName"];
            if ($geo["geoplugin_city"] != '') {
                $city = $geo["geoplugin_city"];
            } else {
                $city = 'no result';
            }
            $trips = Listings::select('listings.*')
                ->leftjoin('locations as from_position', 'from_position.id', '=', 'listings.location_id')
                ->where('from_position.city', '=', $city)
                ->where('listings.starting_date', '>=', now())
                ->where('listings.active', '=', true)
                ->take(10)->get();
        } catch (\Throwable $th) {
            //throw $th;
            $trips = [];
        }
       
        $newsObjects = News::where('publish', true)->paginate(3);
        $postsObjects = Posts::where('publish', true)->paginate(2);
        $current_lat = session()->get('user-lang');
        $current_lng = session()->get('user-long');
        if(count($trips) > 0){
            for($i=0;$i<count($trips);$i++){
                $result = Helper::distance($current_lat,$trips[$i]->sourcecity->lat,$current_lng,$trips[$i]->sourcecity->lng, "K");
                if($result > 0){
                    $trips[$i]->distance_from_you = $result;
                }
            }
        }
        return view('index', compact('newsObjects','postsObjects','trips'));
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function saveLocation(Request $request){
        if($request->lang != 0 && $request->long != 0){
            session()->put('user-lang', $request->lang);
            session()->put('user-long', $request->long);
            return response()->json(['state' => 'success']);
        }
        else{
            return response()->json(['state' => 'error']);
        }
    }

    public function currencySave(Request $request){
        session()->put('currency', $request->currency);
        return response()->json(['state' => 'success']);
    }

    public function test()
    {
        $usersObjects = User::all();
        $url = 'https://api.vk.com/method/friends.get?user_id=609001189&count&access_token='.env('VKONTAKTE_ACCESS_TOKEN').'&v=5.60';
        $users = json_decode(file_get_contents($url));
        if(isset($users->response)){
            print_r($users->response->count);
        }
        else{
            echo 'Access is denied';
        }
    }

    public function blog(Request $request)

    {
        $blog = News::where('page_url', $request->id)->first();
        if (!is_null($blog)) {
            SEOMeta::setTitle($blog->seo_title);
            SEOMeta::setDescription($blog->seo_des);
            $url = route('blog', ['locale' => app()->getLocale(), 'id' => $blog->seo_url]);
            SEOMeta::setCanonical(URL::current() . '/' . $url);
            SEOMeta::addKeyword($blog->seo_keywords);

            OpenGraph::setDescription($blog->seo_des);
            OpenGraph::setTitle($blog->seo_title);
            OpenGraph::setUrl($url);
            OpenGraph::addProperty('short_des', $blog->seo_short_des);

            TwitterCard::setTitle($blog->seo_title);
            TwitterCard::setSite($blog->seo_title);

            JsonLd::setTitle($blog->seo_title);
            JsonLd::setDescription($blog->seo_des);
            $relatedNews = News::where('publish', true)->where('page_url', '!=' , $request->id)->paginate(3);
            return view('blog-template',  compact(['blog', 'relatedNews']));
        }
         else {
            return abort(401);
        }
    }

    public function post(Request $request)

    {
        $blog = Posts::where('url', $request->id)->first();
        if (!is_null($blog)) {
            SEOMeta::setTitle($blog->seo_title);
            SEOMeta::setDescription($blog->seo_des);
            $url = route('blog', ['locale' => app()->getLocale(), 'id' => $blog->seo_url]);
            SEOMeta::setCanonical(URL::current() . '/' . $url);
            SEOMeta::addKeyword($blog->seo_keywords);

            OpenGraph::setDescription($blog->seo_des);
            OpenGraph::setTitle($blog->seo_title);
            OpenGraph::setUrl($url);
            OpenGraph::addProperty('short_des', $blog->seo_short_des);

            TwitterCard::setTitle($blog->seo_title);
            TwitterCard::setSite($blog->seo_title);

            JsonLd::setTitle($blog->seo_title);
            JsonLd::setDescription($blog->seo_des);
            $relatedNews = Posts::where('publish', true)->where('url', '!=' , $request->id)->paginate(3);
            return view('post-template',  compact(['blog', 'relatedNews']));
        }
         else {
            return abort(401);
        }
    }

    public function blogAll(Request $request)

    {
        $blogsObjects = News::where('publish', true)->orderBy('id', 'desc')->paginate(8);
        $postsObjects = Posts::where('publish', true)->orderBy('id', 'desc')->paginate(8);
        $newsTotal = News::where('publish', true)->count();
        $postsTotal = Posts::where('publish', true)->count();
        return view('blogs.blogs-all',  compact(['blogsObjects', 'postsObjects', 'newsTotal', 'postsTotal']));
    }

    public function postAll(Request $request)

    {
        $blogsObjects = News::where('publish', true)->orderBy('id', 'desc')->paginate(8);
        $postsObjects = Posts::where('publish', true)->orderBy('id', 'desc')->paginate(8);
        $newsTotal = News::where('publish', true)->count();
        $postsTotal = Posts::where('publish', true)->count();
        return view('blogs.posts-all',  compact(['blogsObjects', 'postsObjects', 'newsTotal', 'postsTotal']));
    }

    public function blogComment(Request $request)
    {
        $commentBlog = CommentNews::where('user_id', Auth::user()->id)->where('new_id', $request->blog_id)->get();
        if($commentBlog->count() > 0){
            return response()->json(['state' => 'error']);
        }
        else{
            try {
                $commentBlog = CommentNews::create([
                    'user_id' => Auth::user()->id,
                    'new_id' => $request->blog_id,
                    'des' => $request->des
                ]);
                $blog = News::findOrFail($request->blog_id);
                return view('blogs.comment_template', compact('blog'))->render();
                return response()->json(['state' => 'success']);
            } catch (\Throwable $th) {
                return response()->json(['state' => $th]);
            }
        }
    }


    public function commentReply(Request $request)
    {
        try {
            $commentBlog = CommentReply::create([
                'user_id' => Auth::user()->id,
                'comment_news_id' => $request->comment_blogs_id,
                'des' => $request->des
            ]);
            $comment = CommentNews::findOrFail($request->comment_blogs_id);
            return view('blogs.reply_template', compact('comment'))->render();
            // return response()->json(['state' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['state' => $th]);
        }
    }

    public function moreNews(Request $request)
    {
        if ($request->ajax()) {
            $skip = $request->skip;
            $take = 3;
            $moreNews = News::where('publish', true)->skip($skip)->take($take)->get();
            $newsCount = News::where('publish', true)->count();
            return view('blogs.more_news', compact('moreNews', 'newsCount'))->render();
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function morePosts(Request $request)
    {
        if ($request->ajax()) {
            $skip = $request->skip;
            $take = 3;
            $morePosts = Posts::where('publish', true)->skip($skip)->take($take)->get();
            $newsCount = Posts::where('publish', true)->count();
            return view('blogs.more_posts', compact('morePosts', 'newsCount'))->render();
        } else {
            return response()->json('Direct Access Not Allowed!!');
        }
    }

    public function setCurrentTimeZone(Request $request){ //To set the current timezone offset in session
        if(!empty($request)){
            $current_time_zone = $request->curent_zone;
            session()->put('current_time_zone',  $current_time_zone);
        }
    }


}
