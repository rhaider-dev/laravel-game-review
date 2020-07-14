<?php

namespace App\Http\Controllers;

use App\Game;
use App\Category;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Post;

class FrontendController extends Controller
{
    public function landingpage(){
        $featured_games=Game::orderBy('created_at','DESC')->where('featured','=','1')->where('status','=','published')->take(4)->get();
        $latest_games=Game::orderBy('created_at','DESC')->where('status','=','published')->take(4)->get();
        $latest_posts=Post::orderBy('created_at','DESC')->where('status','=','published')->take(3)->get();

        return view('landing-page',compact('featured_games','latest_games','latest_posts'));
    }

    public function category($slug){

        $category=Category::where('slug',$slug)->firstorfail();
        $posts=$category->posts()->paginate(10);
        
        return view('category',compact('posts','category'));
    }

    public function post($slug){
        $post=Post::where('status','=','published')->where('slug',$slug)->firstorfail();
        $might_like=Post::inRandomOrder()->where('status','=','published')->take(2)->get();
        //for sidebar
        $featured_sidebar=Post::inRandomOrder()->where('featured','=','1')->where('status','=','published')->take(5)->get();
        $categories=Category::all();
        $popular_sidebar=Post::inRandomOrder()->where('slug','!=',$slug)->where('status','=','published')->take(3)->get();

        return view('post',compact('post','might_like','featured_sidebar','categories','popular_sidebar'));
    }

    public function archives(){
        $posts=Post::orderBy('created_at','DESC')->where('status','=','published')->paginate(10);
        
        return view('archives',compact('posts'));
    }

    public function page($slug){
        $page=Page::where('slug',$slug)->where('status','=','active')->firstorfail();
        
        return view('page',compact('page'));
    }

    public function games(){
        $categories=Category::all();

        // if there is query
        if(count(request()->query)>0){

            request()->validate([
                'query' => 'min:3',
            ]);
    
            $query = request()->input('query');

            //if search query in null then automatically gives all the games

            if(request()->sort=='low_high'){
                $latest_games = Game::orderBy('rating','ASC')->where('status','=','published')->where('title', 'like', "%$query%")
                ->paginate(9);
            }
            else if(request()->sort=='high_low'){
                $latest_games = Game::orderBy('rating','DESC')->where('status','=','published')->where('title', 'like', "%$query%")                ->paginate(9);
            }
            else{
                $latest_games = Game::where('status','=','published')->where('title', 'like', "%$query%")
                ->paginate(9);
            }
            
        }
        else{
            $latest_games=Game::orderBy('created_at','DESC')->where('status','=','published')->paginate(9);
        }
        
        return view('games',compact('categories','latest_games'));
    }

    public function games_category($slug){
        $categories=Category::all();

        $category=Category::where('slug',$slug)->firstorfail();
       
        // if there is query
        if(count(request()->query)>0){
            
            request()->validate([
                'query' => 'min:3',
            ]);
            
            $query = request()->input('query');
            
            //if search query in null then automatically gives all the games
            if(request()->sort=='low_high'){
                $latest_games_ids = Game::where('status','=','published')->where('title', 'like', "%$query%")->pluck('id');

                $latest_games = Game::whereIn('id',$latest_games_ids)->where('category_id','=',$category->id)->orderBy('rating','ASC')
                ->paginate(9);
                
            }
            else if(request()->sort=='high_low'){
                $latest_games_ids = Game::where('status','=','published')->where('title', 'like', "%$query%")->pluck('id');

                $latest_games = Game::whereIn('id',$latest_games_ids)->where('category_id','=',$category->id)->orderBy('rating','DESC')
                ->paginate(9);
            }
            else{
                $latest_games_ids = Game::where('status','=','published')->where('title', 'like', "%$query%")->pluck('id');
                
                $latest_games=Game::whereIn('id',$latest_games_ids)->where('category_id',$category->id)->paginate(9);
              
            }

        }
        else{
            $latest_games=Game::where('category_id',$category->id)->orderBy('created_at','DESC')->where('status','=','published')->paginate(9);
        } 
        
        return view('games_category',compact('categories','latest_games','category'));
    }

    public function single_game($slug){
        $game=Game::where('slug',$slug)->where('status','=','published')->firstorfail();
        $might_like=Game::inRandomOrder()->where('slug','!=',$slug)->where('status','=','published')->take(4)->get();
        
        return view('game',compact('game','might_like'));
    }

}
