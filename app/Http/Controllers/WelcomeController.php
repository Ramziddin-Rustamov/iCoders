<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Post;
use App\Models\SlideImage;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function index()
    {
        $postCount = Cache::remember('count.posts',now()->addSecond(60),function (){
            return Post::count();
        });
        $teamCount = Cache::remember('count.User',now()->addSecond(60),function (){
            return User::count();
        });
        $techCount = Cache::remember('count.Technology',now()->addSecond(240),function (){
            return Technology::count();
        });
        $portfolioCount = Cache::remember('count.Portfolio',now()->addSecond(120),function(){
            return Portfolio::count();
        });
      
        $team = User::orderBy('id', 'DESC')->where('is_admin',  '1')->limit(4)->get();
        $slideImage = SlideImage::orderBy('created_at','DESC')->limit(3)->get();
        $posts = Post::orderBy('id', 'DESC')->with(['user','comments','likes'])->limit(2)->get();
        $team = User::orderBy('id', 'DESC')->where('is_admin',  '1')->limit(4)->get();
        $technology = Technology::orderBy('id', 'desc')->limit(3)->get();
        $portfolio = Portfolio::orderBy('id', 'DESC')->limit(6)->get();

        return view('welcome',[
            'posts'=> $posts,
            'team' =>$team,
            'technologies' => $technology,
            'portfolio'=>$portfolio,
            'slides' => $slideImage,
            'postCount'=>$postCount,
            'teamCount'=>$teamCount,
            'techCount'=>$techCount,
            'portfolioCount'=>$portfolioCount
        ]);
    }
}
