<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Comment;
use App\Models\Video;
use Illuminate\Http\Request;

trait CommentTrait{

     public function commentStore(Request $request) 
     { 
      $validated = request()->validate([
          
          'comment' => ['required' , 'min:3'],
          'video_id' => ['required' , 'integer']
          ]);
     
          Comment::create($validated + [ 'user_id' => auth()->user()->id ]);
      
          alert()->success('Comment Saved' , 'Done');
          return redirect()->route('videos.edit' , [$validated['video_id'] , '#comments']);
    } 

     

     public function commentDelete(Comment $comment) 
    { 
    $comment->delete();

    alert()->success('Comment is Deleted' , 'Done');
    return redirect()->route('videos.edit' , [$comment->video_id , '#comments']);
    } 

    
    public function commentUpdate(Comment $comment) 
    { 
        $validated = request()->validate([
          
            'comment' => ['required' , 'min:3'],
            'video_id' => ['required' , 'integer']
            ]);
          
    $comment->update($validated + [ 'user_id' => auth()->user()->id ]);

    alert()->success('Comment is Updated' , 'Done');
    return redirect()->route('videos.edit' , [$validated['video_id'] , '#comments']);
    }

}