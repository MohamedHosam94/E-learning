<?php

namespace App\Http\Controllers\Dashboard;

// use App\Http\Controllers\Controller;

use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class Videos extends DashboardController
{

    use CommentTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moduleName = $this->getNameFromController();
        $videos = Video::with('cat' , 'user')->paginate(10);
        return view('Dashboard.videos.index' , 
        compact('videos' , 'moduleName' ) );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills = Skill::get();
        $category = Category::get();
        $tags = Tag::get();
        $moduleName = $this->getNameFromController() ;
       
        return view('Dashboard.videos.create' , compact( 'moduleName' , 'category' , 'skills' , 'tags' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request()->all());

        $validated = request()->validate([
            'name'          => ['required' , 'max:191'],
            'des'           => ['required' , 'min:10'],
            'meta_keywords' => ['max:191'],
            'meta_des'      => ['max:191'],
            'youtube'       => ['required' ,'min:10' , 'url'],
            'published'     => ['required'],
            'image'         => ['required' , 'image'],
            'cat_id'        => ['required' ,'integer'],
            'skills'        => ['required'] , 
            'tags'          => ['required']
            ]);    
       
        // Video::skills()->sync($validated['skills'])
        
        // $skills[] = request()->skills;

         $file = request()->file('image');
         $fileName = time().Str::random('10').'.'.$file->getClientOriginalExtension();
         $file->move( public_path('uploads') , $fileName ); 
         $validated['image'] = $fileName ;       
         
         $row = Video::create($validated  +  ['user_id' => auth()->user()->id] );

         $row->skills()->sync( $validated['skills'] );

         $row->tags()->sync( $validated['tags'] );
        // dd(request()->skills);
        alert()->success('Video is Saved' , 'Done');
        return redirect()->route('videos.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $skills = Skill::get();
        $category = Category::get();
        $tags = Tag::get();
        $moduleName = $this->getNameFromController() ;

        // dd(request('video')->skills()->get());
   
        $selectedSkills = $video->skills()->pluck('skills.id')->toArray();
        
        $selectedTags = $video->tags()->pluck('tags.id')->toArray();

        $comments = $video->comments()->with('user')->get();

        return view('Dashboard.videos.edit' , compact('video' , 'moduleName' , 'category' , 'skills' , 'selectedSkills' , 'tags' , 'selectedTags' , 'comments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Video $video)
    {
       
        $requestArray = request()->validate([

            
            'name'          => ['required' , 'max:191'],
            'des'           => ['required' , 'min:10'],
            'meta_keywords' => ['max:191'],
            'meta_des'      => ['max:191'],
            'youtube'       => ['required' ,'min:10' , 'url'],
            'published'     => ['required'],
            'image'         => ['nullable' , 'image'],
            'cat_id'        => ['required' ,'integer'],
            'skills'        => ['required'] , 
            'tags'          => ['required']
        ]);

        if(request()->hasFile('image')){
         $file = request()->file('image');
         $fileName = time().Str::random('10').'.'.$file->getClientOriginalExtension();
         $file->move( public_path('uploads') , $fileName ); 
         $requestArray['image'] =  $fileName ;
        }

        $video->update($requestArray);

        $video->skills()->sync( $requestArray['skills'] );
 
        $video->tags()->sync( $requestArray['tags'] );
         
        alert()->success('Video is Updated' , 'Done');
        return redirect()->route('videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();

        alert()->success('Video is Deleted' , 'Done');
        return redirect()->back();
    }
}
