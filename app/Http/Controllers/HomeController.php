<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Page;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
// use SweetAlert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only([
            'commentUpdate' ,'commentStore' , 'profileUpdate'
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
  
        $videos = Video::published()->orderBy('id' , 'desc');
        if ( request()->has('search') && request()->get('search') != '' ) {
            $videos = $videos->where('name' , 'like' , "%".request()->get('search')."%");
        }
        $videos = $videos->paginate(30);
        return view('home', compact('videos'));
    }


    public function category(Category $category)
    {
        
        $videos = Video::published()->where('cat_id' , $category->id)
        ->orderBy('id' , 'desc')
        ->paginate(30);
        //    i will send $category to the view with different name $cat so i doesnt make a  
        //    conflict in the view since there is category in the view already
        $cat = $category;
        
        return view('frontend.category.index', compact('cat' , 'videos' ));
    }


    public function skill(Skill $skill)
    {
        
        $videos = Video::published()->whereHas('skills' , function($query) use($skill){
         $query->where('skill_id' , $skill->id);
        })->orderBy('id' , 'desc')->paginate(30);
        //    i will send $skill to the view with different name $sk so i doesnt make a  
        //    conflict in the view since there is skill in the view already
        $sk = $skill;
        
        return view('frontend.skill.index', compact('sk' , 'videos' ));
    }

 
    public function video(Video $video)
    {
        $video->published()->with('skills' , 'tags' , 'cat' , 'user' , 'comments.user');
        //  dd($video->cat);
        // $video = Video::with('skills' , 'tags' , 'cat' , 'user' , 'comments.user');
        return view('frontend.video.index', compact( 'video' ));
    }

    public function tag(Tag $tag)
    {
        
        $videos = Video::published()->whereHas('tags' , function($query) use($tag){
         $query->where('tag_id' , $tag->id);
        })->orderBy('id' , 'desc')->paginate(30);
        
        // $ = $tag;
        
        return view('frontend.tag.index', compact('tag' , 'videos' ));
    }


    public function commentUpdate(Comment $comment){

        if ( ( $comment->user_id == auth()->user()->id ) || auth()->user()->group == 'admin' ) {
            $comment->update(
                request()->validate([ 'comment' => [ 'required' , 'max:2000' ] ])
            );
            alert()->success('Your Comment has been updated' , 'Done');
        }
         
        return redirect()->route('frontend.video' , [ $comment->video_id , '#comments' ] );

    }


    public function commentStore(Video $video){

         $commentData = request()->validate([ 'comment' => [ 'required' , 'max:2000' ] ]);
         $commentData += 
          [ 
          'user_id'   => auth()->user()->id,
          'video_id'  => $video->id 
          ]; 
         
         Comment::create($commentData);
         
         alert()->success('Your Comment has been added' , 'Done');
        return redirect()->route('frontend.video' , [ $video->id , '#comments' ] );

    }


    public function messageStore(){
    
        $messageData = request()->validate([
          'name' => ['required' , 'min:3' ,'max:191'],
          'email' => ['required' , 'min:8' ,'max:191' , 'email'],
          'message' => ['required' , 'min:10' ,'max:500'],
        ]);

        Message::create($messageData);

        alert()
        ->success('Your message have been sent , we will contact you in 24 hours' , 'Done');
        return redirect()->route('frontend.landing' , '#contact-us');

      //   return response()->json([
      //     'message' => 'Your Message Is Sent'
      // ]);
    }


    public function welcome()
    {
        $videos = Video::published()->orderBy('id' , 'desc')->paginate(9);
        $videos_count = Video::published()->count();
        $comments_count = Comment::count();
        $tags_count = Tag::count();
       return view('welcome' , 
       compact('videos' , 'videos_count' , 'comments_count' , 'tags_count'));
    }


    public function page($id , $slug = null)
    {
        $page = Page::findOrFail($id);
        return view('frontend.page.index' , compact('page'));
    }


    public function profile($id , $slug = null)
    {
        $userProfile = User::findOrFail($id);
        return view('frontend.profile.index' , compact('userProfile'));
    }


     public function profileUpdate() 
     { 
      
      $user = User::findOrFail(auth()->user()->id);
      $validated = request()->validate([ 
        'name'  => ['required' , 'string' , 'max:191' , 'min:3'],
        'email' => ['required' , 'string' , 'max:191' , 'min:8' , 'email' , 
        Rule::unique('users')->ignore($user->id)]    
      ]);

      $array = [];

      if ($user->name != $validated['name']){
        $array['name'] = $validated['name'];
      }

      if ($user->email != $validated['email']){
        $array['email'] = $validated['email'];
      }


      if (request()->has('password') && request()->get('password') != ''){
        $pass = request()->validate([
          'password' => ['required' , 'string' ,'min:8']
          ]);
        
        $array['password'] = Hash::make($pass['password']);
      }
         
      if( !empty($array) ){
        $user->update($array);
      }
      
      alert()->success('Your Profile has been updated' , 'Done');

      return redirect()->route('front.profile' , [ 'id' => $user->id ,
      'slug' => Str::slug($user->name , '_') ]);

     } 

}
// trim(str_replace(' '  , '_' , $user->name ))